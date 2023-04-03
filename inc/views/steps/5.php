<?php use qt\core\HTML;?>
<div class="step">
    <?php qt_bg_overlay('summary-bg.svg') ?>
    <div class="tips">
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <p class="step-subtitle">UP NEXT:</p>
                    <h2>Summary</h2>
                    <ul class="tip-content">
                        <li><span class="tip-icon experience-tips-1"><i class="fa fa-pen font-icon"></i></span><span
                                class="tipData">This is the most read section of your resume. Keep it succinct,
                                powerful, and easy
                                to read.</span></li>
                        <li><span class="tip-icon experience-tips-2"><i
                                    class="fa fa-lightbulb font-icon"></i></span><span class="tipData">Give a brief
                                overview of your skills and background and tie that in to how you would
                                positively impact the company.</span></li>
                        <li><span class="tip-icon experience-tips-3"><i
                                    class="fa fa-handshake font-icon"></i></span><span class="tipData">Sometimes it's
                                best to write a custom summary that is specific to the job you are
                                applying to.</span></li>

                    </ul>
                    <div class="checkbox"><input id="hideTips" type="checkbox"><label for="hideTips">Don’t show me tips
                            pages in
                            the
                            future.</label></div>
                    <div class="btn-grp">
                        <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                        <a href="#" class="btn-next">ENTER MY SUMMARY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="summery">
        <?php qt_bg_overlay('summary-bg.svg') ?>
        <div class="container">
            <div class="wrapper">
                <div class="leftcol">
                    <h2>Summary</h2>
                    <p class="subtitle">Briefly describe the value that you bring through your skills, background and
                        experience.</p>
                    <div class="fields-wrapper">
                        <div class="input-grp">
                            <div class="input">
                                <?php echo wp_editor( '', 'self_summary', ['media_buttons' => false, 'editor_height' => 300] ) ?>
                            </div>
                        </div>
                        <div class="btn-grp">
                            <a href="#" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                            <a href="#" class="btn-next">SAVE & CONTINUE</a>
                        </div>
                    </div>
                </div>
                <div class="rightcol">

                </div>
            </div>
        </div>
    </div>
</div>