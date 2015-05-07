<?php
//Start the session
session_start();
if (isset($_SESSION["Last_Activity"])) {
    header("Location: results.php");
    exit;
}
include 'header.html';
echo
    "<div class='container'>
        <div class='row'>
        <form class='form-horizontal' action='index.php' method='POST' role='form'>
            <div class='col-md-6'>
                <div class='box'>
                    <header>
                        <h3>Question 1</h3>
                        <p>What is your age?</p>
                    </header>
                    <section>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_age' value='1,0,0,0,0' required> Under 12 years old</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_age' value='0,1,0,0,0'> 12 - 25 years old</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_age' value='0,0,1,0,0'> 26 - 40 years old</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_age' value='0,0,0,1,0'> 41 - 60 years old</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_age' value='0,0,0,0,1'> 61 years or older</label>
                        </div>
                    </section>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='box'>
                    <header>
                        <h3>Question 2</h3>
                        <p>What is your marital status?</p>
                    </header>
                    <section>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_status' value='1,0,0,0,0' required> Single, never married</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_status' value='0,1,0,0,0'> Married or domestic partnership</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_status' value='0,0,1,0,0'> Widowed</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_status' value='0,0,0,1,0'> Divorced</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_status' value='0,0,0,0,1'> Separated</label>
                        </div>
                    </section>
                </div>
            </div>
            <div class='clearfix'></div>
            <div class='col-md-6'>
                <div class='box'>
                    <header>
                        <h3>Question 3</h3>
                        <p>Please specify your ethnicity.</p>
                    </header>
                    <section>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_race' value='1,0,0,0,0,0' required> White</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_race' value='0,1,0,0,0,0'> Hispanic or Latino</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_race' value='0,0,1,0,0,0'> Black or African American</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_race' value='0,0,0,1,0,0'> Native American or American Indian</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_race' value='0,0,0,0,1,0'> Asian / Pacific Islander</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_race' value='0,0,0,0,0,1'> Other</label>
                        </div>
                    </section>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='box'>
                    <header>
                        <h3>Question 4</h3>
                        <p>What is your favorite season?</p>
                    </header>
                    <section>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_season' value='1,0,0,0' required> Winter</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_season' value='0,1,0,0'> Spring</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_season' value='0,0,1,0'> Summer</label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input type='radio' name='_season' value='0,0,0,1'> Fall</label>
                        </div>
                    </section>
                </div>
            </div>
            <br>
            <div class='col-md-6'>
            <div class='box but'>
            <button type='submit' class='btn btn-primary btn-lg btn-block'>Submit Poll</button>
            <a href='./results.php' class='btn btn-default btn-lg btn-block'>View Results</a>
            </div></div>
            </form>
        </div>
    </div>";
    include "footer.html";
