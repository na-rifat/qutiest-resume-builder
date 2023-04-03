import { btnNext, slideTo } from "../lib/Slider";
import { setData, getData } from "../lib/QtCookie";
import { slideNext } from "../lib/Slider";

let form = $(`.resume-form form`);
let input = form.find("input, select, textarea");

btnNext.on(`click`, function (e) {
    setData("resume", JSON.stringify(form.serializeArray()));

    // console.log(JSON.parse(getData("resume")));
});

// load saved data
if (getData("resume") != null) {
    let formData = JSON.parse(getData("resume"));

    // Loop through the serialized form data
    for (var i = 0; i < formData.length; i++) {
        var item = formData[i];

        // Check if the input is the one you're looking for
        form.find(`[name="${item.name}"]`).val(item.value);
    }
}

// if (getData("currentIndex") != null) {
//     let currentIndex = getData("currentIndex");

//     if (currentIndex < 0) {
//         setData("currentIndex", 0);
//     }

//     slideTo(currentIndex);
// }
