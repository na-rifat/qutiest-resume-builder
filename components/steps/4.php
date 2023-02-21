<?php use qt\core\HTML;?>
<div class="step">
    <?php qt_bg_overlay( 'skills-bg.svg' )?>
    <div class="tips">
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <p class="step-subtitle">UP NEXT:</p>
                    <h2>Skills</h2>
                    <ul class="tip-content">
                        <li><span class="tip-icon experience-tips-1"><i
                                    class="fa fa-paperclip font-icon"></i></span><span class="tipData">Keep your list of
                                skills to around 8 if possible. Also, if you can, use skills listed in the job posting
                                you are applying to.</span></li>
                        <li><span class="tip-icon experience-tips-2"><i class="fa fa-recycle font-icon"></i></span><span
                                class="tipData">Soft skills are the most transferable from one role to the other as they
                                are more universal.</span></li>
                        <li><span class="tip-icon experience-tips-3"><i class="fa fa-tools font-icon"></i></span><span
                                class="tipData">Hard skills, on the other hand, are technical skills. They relate to
                                specific roles and responsibilities.</span></li>

                    </ul>
                    <div class="checkbox"><input id="hideTips" type="checkbox"><label for="hideTips">Don’t show me tips
                            pages in
                            the
                            future.</label></div>
                    <div class="btn-grp">
                        <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                        <a href="#" class="btn-next">ENTER MY SKILLS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form">
        <?php qt_bg_overlay( 'skills-bg.svg' )?>
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <h2>Skills</h2>
                    <p class="subtitle">Start with your most recent position.</p>

                    <div class="fields-wrapper">
                        <div class="input-grp">
                            <div class="input">
                                <label for="skills">Skill #1</label>
                                <input type="text" name="skills[]" id="skills[]">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="skills">Skill #2</label>
                                <input type="text" name="skills[]" id="skills[]">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="skills">Skill #3</label>
                                <input type="text" name="skills[]" id="skills[]">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <label for="skills">Skill #4</label>
                                <input type="text" name="skills[]" id="skills[]">
                            </div>
                        </div>
                        <div class="input-grp">
                            <div class="input">
                                <div class="show-additional"><i class="fa-solid fa-circle-plus"></i>Add another skill
                                </div>
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
</div>