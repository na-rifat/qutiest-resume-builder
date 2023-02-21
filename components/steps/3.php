<?php use qt\core\HTML;?>
<div class="step">
    <div class="tips">
        <?php qt_bg_overlay( 'education-bg.svg' )?>
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <p class="step-subtitle">UP NEXT:</p>
                    <h2>Education</h2>
                    <ul class="tip-content">
                        <li><span class="tip-icon experience-tips-1"><i
                                    class="fa fa-apple-whole font-icon"></i></span><span class="tipData">List your high
                                school experience only if you did not go to
                                college.</span></li>
                        <li><span class="tip-icon experience-tips-2"><i class="fa fa-ribbon font-icon"></i></span><span
                                class="tipData">If you are still in school, note the expected date of graduation, your
                                major, and the type of degree you'll be receiving.</span></li>
                        <li><span class="tip-icon experience-tips-3"><i class="fa fa-award font-icon"></i></span><span
                                class="tipData">Feel free to mention any honors, awards, scholarships or professional
                                certifications or licenses you may have.</span></li>

                    </ul>
                    <div class="checkbox"><input id="hideTips" type="checkbox"><label for="hideTips">Don’t show me tips
                            pages in
                            the
                            future.</label></div>
                    <div class="btn-grp">
                        <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                        <a href="#" class="btn-next">ENTER MY EDUCATION</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form">
        <?php qt_bg_overlay( 'education-bg.svg' )?>
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <h2>Education</h2>
                    <p class="subtitle">Start with your most recent position.</p>
                    <div class="fields-wrapper">
                        <div class="input-grp">
                            <div class="input">
                                <label for="school_name">School name</label>
                                <input type="text" name="school_name" id="school_name">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="school_city">City/Town</label>
                                <input type="text" name="school_city" id="school_city" placeholder="New York">
                            </div>
                            <div class="input">
                                <label for="school_country">Country</label>
                                <input type="text" name="school_country" id="school_country">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="degree">Degree</label>
                                <input type="text" name="degree" id="degree">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="field_of_study">Field of Study</label>
                                <input type="text" name="field_of_study" id="field_of_study">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="graduation_year">Graduation Date</label>
                                <?php echo HTML::months_dropdown( 'graduation_month' ) ?>
                            </div>
                            <div class="input">
                                <?php echo HTML::year_dropdown( 'graduation_year', 1930, date( 'Y' ) ) ?>
                            </div>
                        </div>
                        <div class="btn-grp">
                            <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                            <a href="#" class="btn-next">SAVE & CONTINUE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="summery">
        <?php qt_bg_overlay( 'education-bg.svg' )?>
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <h2>Manage Education</h2>
                    <p class="subtitle">Add, edit or delete your education.</p>
                    <div class="fields-wrapper">
                        <div class="educations"></div>
                        <div class="show-additional"><i class="fa-solid fa-circle-plus"></i>Add another education
                        </div>
                        <div class="btn-grp">
                            <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                            <a href="#" class="btn-next">SAVE & CONTINUE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>