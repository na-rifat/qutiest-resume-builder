<?php use qt\core\HTML;?>
<div class="step">
    <div class="tips">
        <p class="step-subtitle">UP NEXT:</p>
        <h2>Work Experience</h2>
        <ul class="tip-content">
            <li><span class="tip-icon experience-tips-1"><i class="fa fa-award font-icon"></i></span><span
                    class="tipData">Gather information about your accomplishments at previous jobs to fill in this
                    section.</span></li>
            <li><span class="tip-icon experience-tips-2"><i class="fa fa-list-ul font-icon"></i></span><span
                    class="tipData">Need help to fill out your work experience? Simply click to add pre-written examples
                    unique to your industry.</span></li>
            <li><span class="tip-icon experience-tips-3"><i class="fa fa-pen font-icon"></i></span><span
                    class="tipData">Be
                    sure to include keywords from the job posting. This will make your resume more
                    attractive to recruiters.</span></li>

        </ul>
        <div class="checkbox"><input id="hideTips" type="checkbox"><label for="hideTips">Don’t show me tips pages in
                the
                future.</label></div>
        <div class="btn-grp">
            <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="btn-next">ENTER MY WORK EXPERIENCE</a>
        </div>
    </div>
    <div class="form">
        <h2>Work Experience</h2>
        <p class="subtitle">Start with your most recent position.</p>

        <div class="input-grp">
            <div class="input">
                <label for="job_title">Job title</label>
                <input type="text" name="job_title" id="job_title">
            </div>
        </div>
        <div class="input-grp">
            <div class="input">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" placeholder="Amazon">
            </div>
        </div>
        <div class="input-grp">
            <div class="input">
                <label for="company_city">City/Town</label>
                <input type="text" name="company_city" id="company_city" placeholder="New York">
            </div>
            <div class="input">
                <label for="company_country">Country</label>
                <input type="text" name="company_country" id="company_country">
            </div>
        </div>
        <div class="input-grp">
            <div class="input">
                <label for="company_start_month">Start Date</label>
                <?php echo HTML::months_dropdown( 'company_start_month' ) ?>
            </div>
            <div class="input">
                <label for="company_start_year"></label>
                <?php echo HTML::year_dropdown( 'company_start_year', 1930, date( 'Y' ) ) ?>
            </div>
        </div>
        <div class="input-grp">
            <div class="input">
                <label for="company_end_month">End Date</label>
                <?php echo HTML::months_dropdown( 'company_end_month' ) ?>
            </div>
            <div class="input">
                <label for="company_end_year"></label>
                <?php echo HTML::year_dropdown( 'company_end_year', 1930, date( 'Y' ) ) ?>
            </div>
        </div>
        <div class="input-grp">
            <label for="working_currently"><input type="checkbox" name="working_currently"
                    id="working_currently"><span>Currently Work Here</span></label>
        </div>
        <div class="btn-grp">
            <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="btn-next">SAVE & CONTINUE</a>
        </div>
    </div>

</div>