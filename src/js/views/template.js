let template1 = {
    construct() {
        this.data = {
            name: ``,
            city: ``,
            country: ``,
            phone: ``,
            email: ``,
            experience: [],
            education: [],
            skills: [],
            language: [],
        };
    },
    staticInfo() {
        this.data.name = $(`#name`).val();
        this.data.city = $(`#city`).val();
    },
    registerEducation() {},
    registerSkills() {},
    registerExperiences() {},
};
