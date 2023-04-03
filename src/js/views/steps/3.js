import { slideNext, slidePrev, steps } from "../../lib/Slider";
import { loadExperienceAuto } from "../admin/jobs";

const education = $(`.education`);

// Slider navigation
const self_step = steps.eq(2);
const btnNext = self_step.find(`.btn-next`);
const btnPrev = self_step.find(`.btn-back`);

btnNext.eq(0).on(`click`, function (e) {
    slideNext();
});
btnNext.eq(1).on(`click`, function (e) {
    slideNext();
});
btnNext.eq(2).on(`click`, function (e) {
    slideNext();
});
btnPrev.eq(0).on(`click`, function (e) {
    slidePrev();
});
btnPrev.eq(1).on(`click`, function (e) {
    slidePrev();
});
btnPrev.eq(2).on(`click`, function (e) {
    slidePrev();
});
