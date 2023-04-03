import { setCookie, getCookie } from "../../lib/QtCookie";
import { slideNext, slidePrev, steps } from "../../lib/Slider";
import { validate } from "../../lib/validator";

const contact_info = $(`.contact_info`);
// Show additional phone
const showAdditional = contact_info.find(`.show-additional`);
const durShort = 300;
const durLong = durShort * 2;
const self_step = steps.eq(0);
// Slider navigation
const btnNext = self_step.find(`.btn-next`);
const btnPrev = self_step.find(`.btn-back`);

showAdditional.on(`click`, function (e) {
    e.preventDefault();

    let self = $(this);
    self.fadeOut(0);
    let selfInput = self.parents(`.input`).find(`.phone-wrapper`);
    selfInput.fadeIn(durLong);
});

// First screen
btnNext.eq(0).on(`click`, function (e) {
    slideNext();
});

btnPrev.eq(0).on(`click`, function (e) {
    slidePrev();
});
// console.log(btnNext.length);
// From screen
btnNext.eq(1).on(`click`, function (e) {
    if (validate(self_step.find(`.form`))) {
        slideNext();
    }
});
