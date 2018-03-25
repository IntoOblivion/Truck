function changemodel(value)
{

    var modelByMake = {
        VOLVO: ["FH", "FH16"],
        SCANIA: ["R200", "R350"],
        MERCEDES: ["ACTROSS"]
    }

    if (value.length == 0) document.getElementById("truck_model").innerHTML = "<option></option>";
        else {
            var truckModelOptions = "";
            for (modelId in modelByMake[value]) {
                truckModelOptions += "<option>" + modelByMake[value][modelId] + "</option>";
            }
            document.getElementById("truck_model").innerHTML = truckModelOptions;
        }
}