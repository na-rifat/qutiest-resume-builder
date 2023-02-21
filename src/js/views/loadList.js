import { autoComplete, qt_dropdown } from "../lib/Autocomplete";
import { countries } from "../lib/countryList";
// const parent = $(`.resume-form`);
// const jobs = parent.find(`[name=job_title]`);

autoComplete(`jobs`, `title`, `job_title`, 100);
autoComplete(`degrees`, `title`, `degree`, 200);
qt_dropdown(document.getElementById(`country`), countries);
qt_dropdown(document.getElementById(`company_country`), countries);
qt_dropdown(document.getElementById(`school_country`), countries);