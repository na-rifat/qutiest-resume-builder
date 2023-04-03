import { qt_dropdown } from "../../lib/Autocomplete";

const parent = $(`.work-experiences`);

const jobs = parent.find(`.left`);
const experiences = parent.find(`.right`);
let adminJobsTable = jobs.find(`table tbody`);
let adminExperiencesTable = experiences.find(`table tbody`);

// new job
jobs.find(`form`).on(`submit`, function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: qt_vars.ajax_url,
        data: $(this).serialize() + `&action=new_job`,
        dataType: "JSON",
        success: function (res) {
            if (res.success) {
                $(this).find(`[type=text]`).val(``);
                adminJobsTable.html(res.data.list);
            }
        },
    });
});

// new experience
experiences.find(`form`).on(`submit`, function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: qt_vars.ajax_url,
        data: $(this).serialize() + `&action=new_experience`,
        dataType: "JSON",
        success: function (res) {
            if (res.success) {
                $(`#summery`).val(``);
                adminExperiencesTable.html(res.data.list);
            }
        },
    });
});

// puplate jobs list
function loadAdminJobs() {
    $.ajax({
        type: "POST",
        url: qt_vars.ajax_url,
        data: {
            action: `get_admin_job_list`,
        },
        dataType: "JSON",
        success: function (res) {
            if (res.success) {
                adminJobsTable.html(res.data.list);
            }
        },
    });
}

// populate experience list
function loadAdminExperiences() {
    $.ajax({
        type: "POST",
        url: qt_vars.ajax_url,
        data: {
            action: "get_admin_experience_list",
        },
        dataType: "JSON",
        success: function (res) {
            if (res.success) {
                adminExperiencesTable.html(res.data.list);
            }
        },
    });
}

// load jobs auto complete
export function loadJobsAuto(inp) {
    $.ajax({
        type: "POST",
        url: qt_vars.ajax_url,
        data: {
            action: `get_job_list`,
        },
        dataType: "JSON",
        success: function (res) {
            if (res.success) {
                qt_dropdown(document.getElementById(inp), res.data.list);
            }
        },
    });
}
// load experience auto list
export function loadExperienceAuto(job, emb) {
    $.ajax({
        type: "POST",
        url: qt_vars.ajax_url,
        data: {
            action: `get_experience_list`,
            job,
        },
        dataType: "JSON",
        success: function (res) {
            console.log(res);
            if (res.success) {
                res.data.list.forEach((experience) => {
                    emb.append(`<li>
                    <span class="status">
                    <span class="dashicons dashicons-plus-alt2 add"></span>
                    <span class="dashicons dashicons-yes remove"></span>
                    </span>
                    <span class="content">${experience}</span>
                    </li>`);
                });

                // summery add and replace function
                emb.find(`li`).on(`click`, function (e) {
                    let self = $(this);
                    let editor = window.tinymce.get("job_summery");
                    let content = editor.getContent();
                    let selfContent = self.find(`.content`).html();

                    // if the summery has been added already
                    if (self.hasClass(`added`)) {
                        console.log(self[0].outerHTML);
                        editor.setContent(
                            content.replace(`<li>${selfContent}</li>`, "")
                        );

                        self.removeClass(`added`);

                        return;
                    }

                    // otherwise

                    editor.setContent(content + `<li>${selfContent}</li>`);

                    self.addClass(`added`);
                });
            }
        },
    });
}

// Init
loadAdminJobs();
loadAdminExperiences();

// auto complete
loadJobsAuto(`job_title`);
