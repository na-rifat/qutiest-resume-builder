<?php
    use qrb\Resume;
?>
<section class="work-experiences">
    <div class="wrapper">
        <h2>Work experiences</h2>
        <hr>
        <br><br>
        <div class="col-wrapper">
            <div class="left">
                <form action="#" class="new-job">
                    <h3>Add Job</h3>
                    <div class="input-grp">
                        <input type="text" name="title" id="title" placeholder="Job title">
                    </div>
                    <button class="button">Add</button>
                </form>
                <table class="jobs">
                    <thead>
                        <tr>
                            <th>Job title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="right">
                <form action="#" class="new-job">
                    <h3>Add Experience</h3>
                    <div class="input-grp">
                        <select type="text" name="job" id="job" placeholder="Select Job" required>
                            <option value="" disabled selected>-- Select Job --</option>
                            <?php echo Resume::getJobSelect() ?>
                        </select>
                    </div>
                    <div class="input-grp">
                        <textarea type="text" name="summery" id="summery" placeholder="Summary" rows="10"></textarea>
                    </div>
                    <button class="button">Add</button>
                </form>
                <table class="jobs">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Experience</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>