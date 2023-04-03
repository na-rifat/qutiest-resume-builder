import { slideNext, slidePrev, steps } from "../../lib/Slider";
import { loadExperienceAuto } from "../admin/jobs";

const work_experience = $(`.work_experience`);
const summery = work_experience.find(`.summery`);
const subTitleJob = summery.find(`.subtitle strong`);
const form = work_experience.find(`.form`);
const jobTitle = form.find(`#job_title`);
// const btnNext = form.find(`.btn-next`);

const self_step = steps.eq(1);
// Slider navigation
const btnNext = self_step.find(`.btn-next`);
const btnPrev = self_step.find(`.btn-back`);

btnNext.eq(0).on(`click`, () => {
    subTitleJob.text(jobTitle.val());
    loadExperienceAuto(jobTitle.val(), self_step.find(`ul.experience-list`));

    slideNext();
});

btnNext.eq(1).on(`click`, () => {
    slideNext();
});
btnNext.eq(2).on(`click`, () => {
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
