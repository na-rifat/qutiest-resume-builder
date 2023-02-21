const work_experience = $(`.work_experience`);
const form = work_experience.find(`.form`);
const summery = work_experience.find(`.summery`);
const btnNextForm = form.find(`.btn-next`);
const subTitleJob = summery.find(`.subtitle strong`);
const jobTitle = form.find(`#job_title`);

btnNextForm.on(`click`, () => {
    subTitleJob.text(jobTitle.val())
});
