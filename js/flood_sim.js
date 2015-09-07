
var canvas;
var context;

var loaded                  = false;

var interval                = 1.0 / 30.0;
var time                    = 0.0;

var xSize                   = 15;
var ySize                   = 8;

var cellTypeNone            = -1;
var cellTypeEmpty           = 0;
var cellTypeCorridor        = 1;
var cellTypeLeak            = 2;
var cellTypeDoorShut        = 3;
var cellTypeDoorOpen        = 4;

var interactModeBuild       = 0;
var interactModePlaceDoor   = 1;
var interactModePlaceLeak   = 2;

var noFloodGroup            = -1;
var noCompartment           = -1;

var compartmentStatusNoLeaks    = 0;
var compartmentStatusLeaks      = 1;

var cellType                = new Array(xSize * ySize);
var cellWaterLevel          = new Array(xSize * ySize);
var cellDelta               = new Array(xSize * ySize);
var cellFloodGroup          = new Array(xSize * ySize);
var cellCompartment         = new Array(xSize * ySize);
var floodGroupWaterLevel;
var floodGroupArea;
var compartmentStatus;

var cellSize                = 40;   // In pixels
var cellOverlap             = 10;   // In pixels.
var doorWidth               = 14;   // In pixels.

var controlPressed          = false;
var interactMode            = interactModeBuild;

var maxCompression          = 0.5;
var leakSpeed               = 4.0;
var flowRate                = 10.0;
var bulkheadFlowRate        = 1.0;
var drainRate               = 1.0 / 60.0;
var damageFlashFrequency    = 7;
var damageFlashAmount       = 0.15;

var globalWaterLevel        = 5.5;
var equalizeCompartments    = true;
var showPressure            = false;

var tilesImage;
var skyGradient;
var waterGradient;


function RenderCells()
{
    var sw = cellSize + cellOverlap * 2;
    var sh = cellSize + cellOverlap * 2;
                
    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            var c = cellType[x + y * xSize];

            if (c != cellTypeEmpty)
            {

                var n = IsInside(x, y - 1) ? 1 : 0;
                var s = IsInside(x, y + 1) ? 1 : 0;
                var e = IsInside(x + 1, y) ? 1 : 0;
                var w = IsInside(x - 1, y) ? 1 : 0;

                var dx = x * cellSize - cellOverlap;
                var dy = y * cellSize - cellOverlap;

                var tileIndex = n * 8 + e * 4 + s * 2 + w;

                var sy = tileIndex * sh;
                context.drawImage(tilesImage, 0, sy, sw, sh, dx, dy, sw, sh);
            
            }
            if (c == cellTypeLeak)
            {
                var sy = 16 * sh;
                context.drawImage(tilesImage, 0, sy, sw, sh, dx, dy, sw, sh);
            }
            else if (c == cellTypeDoorShut)
            {
                var sy = 17 * sh;
                context.drawImage(tilesImage, 0, sy, sw, sh, dx, dy, sw, sh);
            }
            else if (c == cellTypeDoorOpen)
            {
                var sy = 18 * sh;
                context.drawImage(tilesImage, 0, sy, sw, sh, dx, dy, sw, sh);
            }

        }
    }
}

function GetVisualWaterLevel(x, y)
{
    var index = x + y * xSize;
    var w = 0;

    if (equalizeCompartments)
    {
        var floodGroupIndex = cellFloodGroup[index];
        if (floodGroupIndex != noFloodGroup)
        {
            w = floodGroupWaterLevel[floodGroupIndex];
        }
    }
    else
    {
        w = cellWaterLevel[index];
    }
    return Math.min(w, 1.0);
}

function RemoveInvalidDoors()
{
    // Our construction system makes some door placement invalid.
    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            if (IsDoor(cellType[x + y * xSize]))
            {
                var invalid = false;
                if (y - 1 >= 0 && cellType[x + (y - 1) * xSize] != cellTypeEmpty)
                {
                    invalid = true;
                }
                else if (y + 1 < ySize && cellType[x + (y + 1) * xSize] != cellTypeEmpty)
                {
                    invalid = true;
                }

                if (invalid)
                {
                    cellType[x + y * xSize] = cellTypeCorridor;
                }

            }
        }
    }
}

function GetPressureColor(w)
{
    var r, g, b;
    if (w > 3.0)
    {
        var l = Math.min(w - 3.0, 1.0);
        // Yellow to red.
        r = 1;
        g = 1 - l;
        b = 0;
    }
    else if (w > 2.0)
    {
        var l = w - 2.0;
        // Cyan to yellow.
        r = l;
        g = 1;
        b = 1 - l;
    }
    else  if (w > 1.0)
    {
        var l = w - 1.0;
        // Blue to cyan.
        r = 0;
        g = l;
        b = 1;
    }
    else
    {
        // Black to blue.
        r = 0;
        g = 0;
        b = w;
    }
    return "rgba(" + Math.floor(r * 255) + "," + Math.floor(g * 255) + "," + Math.floor(b * 255) + ", 0.5)";
}


function RenderCellOverlay(x, y, offset, width, damagedFillStyle)
{
    var w = GetVisualWaterLevel(x, y);
    if (w > 0)
    {
        if (showPressure)
        {
            var pressure = cellWaterLevel[x + y * xSize];
            context.fillStyle = GetPressureColor(pressure);
        }
        else
        {
            context.fillStyle = "rgba(0, 100, 255, 0.5)";
        }
        var height = w * cellSize;
        context.fillRect(x * cellSize + offset, (y + 1) * cellSize - height, width, height);
    }

    var compartmentIndex = cellCompartment[x + y * xSize];
    if (compartmentIndex != noCompartment)
    {
        if (compartmentStatus[compartmentIndex] == compartmentStatusLeaks)
        {
            context.fillStyle = damagedFillStyle;
            context.fillRect(x * cellSize + offset, y * cellSize, width, cellSize);
        }
    }


}

function RenderCellsOverlays()
{
    context.fillStyle = "rgba(0, 100, 255, 0.5)";
    context.globalCompositeOperation = "source-atop";

    var opacity = (Math.sin(time * damageFlashFrequency) * 0.5 + 0.5) * damageFlashAmount;
    var damagedFillStyle = "rgba(255, 0, 0, " + opacity + ")";

    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            var c = cellType[x + y * xSize];
            if (IsDoor(c))
            {
                // Doors render in a special way since they display the water level from the two adjacent cells.
                if (x - 1 > 0)
                {
                    RenderCellOverlay(x - 1, y, cellSize, doorWidth, damagedFillStyle);
                }
                if (x + 1 < xSize)
                {
                    RenderCellOverlay(x + 1, y, -doorWidth, doorWidth, damagedFillStyle);
                }
            }
            else
            {
                RenderCellOverlay(x, y, 0, cellSize, damagedFillStyle);
            }
        }
    }    

    context.globalCompositeOperation = "destination-over";

    // Render the global water level.
    var waterHeight = globalWaterLevel * cellSize;
    context.fillStyle = waterGradient;    
    context.fillRect(0, ySize * cellSize - waterHeight, xSize * cellSize, waterHeight);

    // Render the sky.
    context.fillStyle = skyGradient;    
    context.fillRect(0, 0, xSize * cellSize, ySize * cellSize);

    context.globalCompositeOperation = "source-over";

}

function Render()
{
    context.clearRect(0, 0, canvas.width, canvas.height);
    RenderCells();
    RenderCellsOverlays();
}

function AssignFloodGroup(x, y, floodGroupIndex)
{
    if (cellFloodGroup[x + y * xSize] != noFloodGroup)
    {
        return 0.0;
    }

    var area = 1.0;
    cellFloodGroup[x + y * xSize] = floodGroupIndex;

    if (IsInside(x - 1, y) && !IsDoor(cellType[(x - 1) + y * xSize]))
    {
        area += AssignFloodGroup(x - 1, y, floodGroupIndex);
    }
    if (IsInside(x + 1, y) && !IsDoor(cellType[(x + 1) + y * xSize]))
    {
        area += AssignFloodGroup(x + 1, y, floodGroupIndex);
    }

    return area;
}

function AssignCompartment(x, y, compartmentIndex)
{
    if (cellCompartment[x + y * xSize] != noCompartment)
    {
        return 0.0;
    }

    var area = 1.0;
    cellCompartment[x + y * xSize] = compartmentIndex;

    if (IsInside(x - 1, y) && cellType[(x - 1) + y * xSize] != cellTypeDoorShut)
    {
        area += AssignCompartment(x - 1, y, compartmentIndex);
    }
    if (IsInside(x + 1, y) && cellType[(x + 1) + y * xSize] != cellTypeDoorShut)
    {
        area += AssignCompartment(x + 1, y, compartmentIndex);
    }
    if (IsInside(x, y - 1))
    {
        area += AssignCompartment(x, y - 1, compartmentIndex);
    }
    if (IsInside(x, y + 1))
    {
        area += AssignCompartment(x, y + 1, compartmentIndex);
    }    

    return area;
}

function BuildFloodGroups()
{

    for (var index = 0; index < xSize * ySize; ++index)
    {
        cellFloodGroup[index] = noFloodGroup;
    }

    floodGroupArea = new Array();
    var numFloodGroups = 0;
    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            if (IsInside(x, y) && !IsDoor(cellType[x,y]))
            {
                var area = AssignFloodGroup(x, y, numFloodGroups);
                if (area > 0)
                {
                    ++numFloodGroups;
                    floodGroupArea.push(area);
                }
            }
        }
    }

    floodGroupWaterLevel = new Array(numFloodGroups);
    for (var i = 0; i < numFloodGroups; ++i)
    {
        floodGroupWaterLevel[i] = 0;
    }

}

function BuildCompartments()
{

    for (var index = 0; index < xSize * ySize; ++index)
    {
        cellCompartment[index] = noCompartment;
    }

    var numCompartments = 0;
    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            if (IsInside(x, y) && !IsDoor(cellType[x,y]))
            {
                var area = AssignCompartment(x, y, numCompartments);
                if (area > 0)
                {
                    ++numCompartments;
                }
            }
        }
    }

    compartmentStatus = new Array(numCompartments);
    for (var i = 0; i < numCompartments; ++i)
    {
        compartmentStatus[i] = compartmentStatusNoLeaks;
    }

}

function ComputeFloodGroupLevels()
{
    for (var index = 0; index < floodGroupWaterLevel.length; ++index)
    {
        floodGroupWaterLevel[index] = 0.0;
    }
    for (var index = 0; index < xSize * ySize; ++index)
    {
        if (cellFloodGroup[index] != noFloodGroup)
        {
            var floodGroupIndex = cellFloodGroup[index];
            // Averave is logically better, but max gives fewer artifacts.
            //floodGroupWaterLevel[floodGroupIndex] += cellWaterLevel[index];
            floodGroupWaterLevel[floodGroupIndex] = Math.max(floodGroupWaterLevel[floodGroupIndex], cellWaterLevel[index]);
        }
    }
    /*
    for (var index = 0; index < floodGroupWaterLevel.length; ++index)
    {
        floodGroupWaterLevel[index] /= floodGroupArea[index];
    } 
    */   
}

function OutsidePressure(y)
{
    var depth = y - (ySize - globalWaterLevel);
    if (depth > 0.0)
    {
        var outsidePressure = 1.0 + depth * maxCompression;
        return outsidePressure;
    }
    return -1.0;
}

function AddLeaksAndDraining(deltaTime)
{

    for (var index = 0; index < compartmentStatus.length; ++index)
    {
        compartmentStatus[index] = compartmentStatusNoLeaks;
    }

    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            var index = x + y * xSize;
            if (cellType[index] == cellTypeLeak)
            {
                var outsidePressure = OutsidePressure(y);
                var delta = outsidePressure - cellWaterLevel[index];

                if (delta > 0)
                {
                    cellWaterLevel[index] += Math.min(delta, deltaTime * leakSpeed);
                }
                else
                {
                    cellWaterLevel[index] -= Math.min(-delta, deltaTime * leakSpeed);
                }

                var compartmentIndex = cellCompartment[index];
                compartmentStatus[compartmentIndex] = compartmentStatusLeaks;
            }
        }
    }

    var drainFlow = drainRate * deltaTime;

    for (var index = 0; index < xSize * ySize; ++index)
    {
        var compartmentIndex = cellCompartment[index];
        if (compartmentIndex != noCompartment)
        {
            if (compartmentStatus[compartmentIndex] == compartmentStatusNoLeaks)
            {
                var remainingWaterLevel = cellWaterLevel[index];
                cellWaterLevel[index] = Math.max(remainingWaterLevel - drainFlow, 0.0);
            }
        }
    }

}

function IsDoor(cellType)
{
    return cellType == cellTypeDoorShut || cellType == cellTypeDoorOpen;
}

function IsInside(x, y)
{
    return x >= 0 && y >= 0 && x < xSize && y < ySize && cellType[x + y * xSize] != cellTypeEmpty;   
}

function IsPassable(x, y)
{
    return IsInside(x, y) && cellType[x + y * xSize] != cellTypeDoorShut;
}

function Clamp(x, min, max)
{
    return Math.max(min, Math.min(x, max))    
}

function FloodSimUpdate()
{
    if (!loaded)
    {
        return;
    }
    
    var deltaTime = interval;
    time += deltaTime;

    AddLeaksAndDraining(deltaTime);
    Step(deltaTime);
    ComputeFloodGroupLevels();
    Render();
}

function FloodSimOnContextMenu(event)
{
    // Block the context menu so we can handle right click in OnMouseDown.
    event.preventDefault();
    return false;
}

function FloodSimOnMouseDown(event)
{

    // From: http://www.quirksmode.org/js/events_properties.html
    var rightclick;
    if (event.which)
    {
        rightClick = (event.which == 3);
    }
    else if (event.button)
    {
        rightClick = (event.button == 2);
    }

    var rect = canvas.getBoundingClientRect();
    var x = Math.floor((event.clientX - rect.left) / cellSize);
    var y = Math.floor((event.clientY - rect.top)  / cellSize);

    var rebuild = false;
    var rebuildCompartments = false;

    if (x >= 0 && y >= 0 && x < xSize && y < ySize)
    {
        var index = x + y * xSize;

        if (controlPressed || rightClick)
        {
            // Erase mode.
            if (cellType[index] == cellTypeCorridor)
            {
                cellType[index] = cellTypeEmpty;
                rebuild = true;
            }
            else if (cellType[index] == cellTypeDoorShut ||
                     cellType[index] == cellTypeDoorOpen)
            {
                cellType[index] = cellTypeCorridor;
                rebuild = true;
            }
            else if (cellType[index] == cellTypeLeak)
            {
                cellType[index] = cellTypeCorridor;
            }
        }
        else if (interactMode == interactModeBuild)
        {
            // Regular mode.
            if (cellType[index] == cellTypeEmpty)
            {
                cellType[index] = cellTypeCorridor;
                rebuild = true;
            }
            else if (cellType[index] == cellTypeCorridor)
            {
                cellType[index] = cellTypeEmpty;
                rebuild = true;
            }
            else if (cellType[index] == cellTypeDoorShut)
            {
                cellType[index] = cellTypeDoorOpen;
                rebuildCompartments = true;
            }
            else if (cellType[index] == cellTypeDoorOpen)
            {
                cellType[index] = cellTypeDoorShut;
                rebuildCompartments = true;
            }
            else if (cellType[index] == cellTypeLeak)
            {
                cellType[index] = cellTypeCorridor;
            }
        }
        else if (interactMode == interactModePlaceLeak)
        {
            cellType[index] = cellTypeLeak;
            rebuild = true;
        }
        else if (interactMode == interactModePlaceDoor)
        {
            cellType[index] = cellTypeDoorShut;
            rebuild = true;
        }

    }

    if (rebuild)
    {
        RemoveInvalidDoors();
        BuildFloodGroups();
        rebuildCompartments = true;
    }

    if (rebuildCompartments)
    {
        BuildCompartments();
    }

}

function Step(deltaTime)
{

    for (var index = 0; index < xSize * ySize; ++index)
    {
        cellDelta[index] = 0.0;
    }

    //
    // Consider two vertically stacked cells with "pressure" A and B (we also label these cells as A and B for description)
    // A is the cell we're computing the flow for and B is it's neighbor.
    //
    //      +---+
    //      | A |
    //      +---+
    //      | B |
    //      +---+
    //
    // The total volume of water stored between these two cells is: sum = A + B. 
    // We will apply rules to rebalance the distribution of water to equalize the pressure.
    //
    // There are 3 cases to consider:
    //      - All of the water can fit in cell B
    //      - All of the water can fit in cell A and B without overfilling
    //      - Both A and B will be overfilled.
    //
    // We're going to compute new pressure values A' and B' to equalize the pressure.
    //
    // To allow for pressure to propagate through the entire grid, we allow the lower cell to have slightly higher pressure
    // than the upper cell, so that after equalization the pressure should be:
    // 
    //      B' = A' + maxCompression
    //
    // To preserve the volume of water during the equalization, the following must hold:
    //
    //      A + B = A' + B'
    //
    // We can use these two equations to solve for A' in terms of our known quantities:
    //
    //      A + B = A' + A' + maxCompression
    //      A' = (A + B - maxCompression) / 2
    //
    // By solving these two equations we compute how much water must flow from A to B to achieve the equalization:
    //
    //      flow = A - A'
    //           = A - (A + B - maxCompression) / 2
    //

    for (var y = 0; y < ySize; ++y)
    {
        for (var x = 0; x < xSize; ++x)
        {
            if (!IsPassable(x, y))
            {
                continue;
            }

            var index = x + y * xSize;
            var remainingWaterLevel = cellWaterLevel[index];

            var maxVerticalFlow = flowRate * deltaTime;
            var maxSideFlow;

            if (cellType[index] == cellTypeDoorOpen)
            {
                maxSideFlow = bulkheadFlowRate * deltaTime;
            }
            else
            {
                maxSideFlow = flowRate * deltaTime;
            }

            // Equalize with the side neighbors. Doing this before the up and down directions leads to a more
            // stable result.

            var flowE = 0.0;
            var flowW = 0.0;

            var average = cellWaterLevel[index];
            var numNeighbors = 0;

            if (IsPassable(x - 1, y))
            {
               average += cellWaterLevel[(x - 1) + y * xSize];
                ++numNeighbors;

                flowW = (remainingWaterLevel - cellWaterLevel[(x - 1) + y * xSize]) * 0.25;
                flowW = Clamp(flowW, 0, maxSideFlow);
            }
            if (IsPassable(x + 1, y))
            {
                average += cellWaterLevel[(x + 1) + y * xSize];
                ++numNeighbors;
                 
                flowE = (remainingWaterLevel - cellWaterLevel[(x + 1) + y * xSize]) * 0.25;
                flowE = Clamp(flowE, 0, maxSideFlow);    
            }

            average /= numNeighbors + 1;

            var maxFlow = Math.max(remainingWaterLevel - average, 0);
            var totalFlow = flowW + flowE;
            var restrictedFlow = totalFlow;//Math.min(totalFlow, maxFlow);

            // Rescale the flow so we don't exceed the restricted flow.

            if (flowW > 0)
            {
                flowW = flowW * restrictedFlow / totalFlow;
                cellDelta[(x - 1) + y * xSize] += flowW;
            }
            if (flowE > 0)
            {
                flowE = flowE * restrictedFlow / totalFlow;
                cellDelta[(x + 1) + y * xSize] += flowE;
            }            
            cellDelta[index] -= restrictedFlow;
            remainingWaterLevel -= restrictedFlow;

            // Cell below.
            if (IsPassable(x, y + 1))
            {
                var index2 = x + (y + 1) * xSize;
                var sum = remainingWaterLevel + cellWaterLevel[index2];
                var flow;
                if (sum <= 1.0)
                {
                    // All of the water can fit in a single cell, so it will all flow to the bottom.
                    flow = remainingWaterLevel;
                }
                else if (sum <= 2.0 + maxCompression)
                {
                    // Bottom cell will fill to capacity and whatever is left over will go in the top cell.
                    // We allow the bottom cell to be overfilled by an amount that's proportional to what's
                    // left in the top cell:
                    //      A' = sum - B'
                    //      B' = 1 + A' * maxCompression
                    var newWaterLevel = (sum - 1.0) / (1.0 + maxCompression);
                    flow = remainingWaterLevel - newWaterLevel;
                }
                else
                {
                    // Both cells are under pressure, so equalize:
                    //      A + B = A' + B'
                    //      B' = A' + maxCompression
                    var newWaterLevel = (remainingWaterLevel + cellWaterLevel[index2] - maxCompression) * 0.5;
                    flow = remainingWaterLevel - newWaterLevel;
                }
                flow = Clamp(flow, 0, maxVerticalFlow);

                cellDelta[index] -= flow;
                cellDelta[index2] += flow;

                remainingWaterLevel -= flow;
            }

            // Cell above.
            if (IsPassable(x, y - 1))
            {
                var index2 = x + (y - 1) * xSize;
                var sum = remainingWaterLevel + cellWaterLevel[index2];
                var flow;

                if (sum <= 1.0)
                {
                    // All of the water can fit in a single cell, so it will all flow to the bottom, which
                    // means our flow out of this cell is negative (i.e. we don't do it).
                    flow = 0.0;
                }
                else if (sum <= 2.0 + maxCompression)
                {
                    // Bottom cell will fill to capacity, and whatever is left over will go in the top cell.
                    // We allow the bottom cell to be overfulled by an amount that's proportional to what's
                    // left in the top cell:
                    //      A' = 1 + B' * maxCompression
                    //      B' = sum - A'
                    var newWaterLevel = (1.0 + maxCompression * sum) / (1.0 + maxCompression);
                    flow = remainingWaterLevel - newWaterLevel;
                }
                else
                {
                    // Both cells are under pressure, so equalize.
                    //      A + B = A' + B'
                    //      A' = B' + maxCompression
                    var newWaterLevel = (cellWaterLevel[index] + cellWaterLevel[index2] + maxCompression) * 0.5;
                    flow = remainingWaterLevel - newWaterLevel;
                }
                flow = Clamp(flow, 0, maxVerticalFlow);

                cellDelta[index] -= flow;
                cellDelta[index2] += flow;

                remainingWaterLevel -= flow;
            }

        }
    }

    for (var index = 0; index < xSize * ySize; ++index)
    {
        cellWaterLevel[index] += cellDelta[index];
    }

}

function FloodSimOnKeyDown(event)
{
    if (event.keyCode == 17)
    {
        controlPressed = true;
    }
}

function FloodSimOnKeyUp(event)
{
    if (event.keyCode == 17)
    {
        controlPressed = false;
    }
}

function SyncToControlsForm()
{
    document.getElementById("flood_sim_show_pressure").checked = showPressure;

    if (interactMode == interactModeBuild)
    {
        document.getElementById("flood_sim_build").checked = true;
    }
    else if (interactMode == interactModePlaceDoor)
    {
        document.getElementById("flood_sim_place_door").checked = true;
    }
    else if (interactMode == interactModePlaceLeak)
    {
        document.getElementById("flood_sim_place_leak").checked = true;
    }

    var globalWaterLevelSlider = document.getElementById("flood_sim_global_water_level");
    globalWaterLevelSlider.value = globalWaterLevel * (globalWaterLevelSlider.max - globalWaterLevelSlider.min) / ySize + Number(globalWaterLevelSlider.min);

}

function SyncFromControlsForm()
{
    showPressure = document.getElementById("flood_sim_show_pressure").checked;

    if (document.getElementById("flood_sim_place_door").checked)
    {
        interactMode = interactModePlaceDoor;
    }
    else if (document.getElementById("flood_sim_place_leak").checked)
    {
        interactMode = interactModePlaceLeak;
    }
    else
    {
        // Interact mode.
        interactMode = interactModeBuild;
    }

    var globalWaterLevelSlider = document.getElementById("flood_sim_global_water_level");
    globalWaterLevel = ySize * (globalWaterLevelSlider.value - globalWaterLevelSlider.min) / (globalWaterLevelSlider.max - globalWaterLevelSlider.min);

    CreateGradients();

}

function OnControlsFormChange(event)
{
    SyncFromControlsForm();
}

function AddFormChangeMethod(form, tag, method)
{
    var inputs = form.getElementsByTagName(tag); 
    for (var i = 0; i < inputs.length; i++)
    {
        inputs[i].addEventListener("change", method);
        inputs[i].addEventListener("input", method);
    }
}

function ApplyLayout(layout)
{
    for (var index = 0; index < xSize * ySize && index < layout.length; ++index)
    {
        if (layout.charAt(index) == '.')
        {
            cellType[index] = cellTypeEmpty;
        }
        else if (layout.charAt(index) == 'X')
        {
            cellType[index] = cellTypeCorridor;
        }
        else if (layout.charAt(index) == 'D')
        {
            cellType[index] = cellTypeDoorShut;
        } 
        else if (layout.charAt(index) == 'F')       
        {
          cellType[index] = cellTypeCorridor;  
          cellWaterLevel[index] = 1.0;
        }
        else if (layout.charAt(index) == 'L')
        {
            cellType[index] = cellTypeLeak;  
        }
    }
}

function CreateGradients()
{
    var waterHeight = globalWaterLevel * cellSize;    
    skyGradient = context.createLinearGradient(0, -waterHeight, 0, canvas.height - waterHeight);
    skyGradient.addColorStop(0, '#004CB3');    
    skyGradient.addColorStop(1, '#8ED6FF');   


    waterGradient = context.createLinearGradient(0, ySize * cellSize - waterHeight, 0, ySize * cellSize - waterHeight + ySize * cellSize);
    waterGradient.addColorStop(0, 'rgba(20, 80, 130, 1)');   
    waterGradient.addColorStop(1, 'rgba(0, 0, 0, 1)');  
}

function FloodSimInitialize()
{
    canvas = document.getElementById("flood_sim_canvas");
    context = canvas.getContext("2d");

    canvas.tabIndex    = 1000; // Force the canvas to get key inputs
    canvas.addEventListener("mousedown", FloodSimOnMouseDown);
    canvas.addEventListener("contextmenu", FloodSimOnContextMenu);
    canvas.addEventListener("keydown",   FloodSimOnKeyDown);
    canvas.addEventListener("keyup",     FloodSimOnKeyUp);

    // Add event handlers for all of our form elements.
    var form = document.getElementById("flood_sim_controls");    
    AddFormChangeMethod(form, "input", OnControlsFormChange);
    AddFormChangeMethod(form, "radio", OnControlsFormChange);

    SyncToControlsForm();

    for (var index = 0; index < xSize * ySize; ++index)
    {
        cellType[index] = cellTypeEmpty;
        cellWaterLevel[index] = 0;
    }

    // Initial layout.

    var layout = "\
...............\
.....XXXXX.....\
.....X......X..\
..X..X......X..\
..X..XXXXXXXX..\
..X.......X....\
..XXXXXDXXLX...\
..............."
    ApplyLayout(layout);

    BuildFloodGroups();
    BuildCompartments();

    tilesImage = new Image();
    tilesImage.src = "img/flood_sim_tiles.png";
    tilesImage.onload = function() { loaded = true; };

    CreateGradients();    

    setInterval(FloodSimUpdate, interval * 1000.0);
}
