@extends('frontend.layouts.app')
@section('title') {{ 'Product list' }} @endsection
@section('content')
<style>
        .static-table-container {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .static-table {
            width: 100%;
            border-collapse: collapse;
        }

        .static-table th,
        .static-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .static-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .static-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .static-table tr:hover {
            background-color: #e0e0e0;
        }

        .question {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .question p {
            margin: 0;
        }

        .radio-group {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .radio-group label {
            margin-right: 20px;
            font-weight: normal;
            display: flex;
            align-items: center;
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
        }

        .required::after {
            content: ' *';
            color: red;
            font-weight: bold;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
        }

        #result {
            margin-top: 20px;
            font-weight: bold;
        }

        .meter-container {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 20px auto;
        }

        .meter {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            transform: rotate(-90deg);
        }

        .circle-bg {
            fill: none;
            stroke: #ddd;
            stroke-width: 20;
        }

        .circle-fill {
            /* background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important; */
            fill: none;
            stroke: #ffb000 !important;
            stroke-width: 20;
            stroke-dasharray: 565.48;
            /* Circumference of the circle with radius 90 */
            stroke-dashoffset: 565.48;
            /* Start with a full circle */
            transition: stroke-dashoffset 0.3s ease;
            transform-origin: center;
        }

        .meter-level {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .yes {
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 5px 3px 25px -1px rgb(10% 20% 0 / 10%);
            margin-bottom: 5%;
            padding: 4% 4% 4%;


        }

        .radio-group label {
            font-weight: 600;
            font-size: 18px;
        }


        .cop {
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
            color: #fff;
            padding: 15px 24px 5px;
            border-radius: 10px;
            font-size: 25px;
            margin-bottom: 5%;
        }

        .cop h3 {
            color: #fff;
        }

        .radio-group {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            border-bottom: 2px solid #ffb000;
            padding-bottom: 20px;
        }

        .non {
            border-bottom: 2px solid #fff;
        }

        .comments-wrap>h3,
        .comment-reply-wrap>h3 {
            font-size: 20px;
            color: #373737;
            font-weight: 800;
        }

        .radio-group label {
            font-weight: 600;
            font-size: 17px;
        }

        .cop h3 {
            color: #fff;
            font-size: 22px;
            font-weight: 800;
        }

        .new-be {
            width: 100%;
            font-size: 20px;
            font-weight: 600;
        }

        .baa {
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
            padding: 37px;
            margin: 37px 0px 10px;
            border-radius: 10px;
        }

        #result {
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
            font-size: 31px;
            margin-bottom: 33px;
            color: #fff;
        }

        .static-table th {
            background-color: #f4f4f4;
            font-weight: bold;
            color: #000;
        }
        .static-table-container {
    margin-top: 30px;
    padding: 34px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.meter-level {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 24px;
    color: #000;
    font-weight: bold;
}
.circle-bg {
    fill: none;
    stroke: #fff;
    stroke-width: 20;
}
    </style>
    <section>
            <div class="w-100 pt-80  position-relative">
                <!-- checkout-section -->
                <section class="ttm-row checkout-section tohh break-991-colum clearfix">
                    <div class="container yes">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="mb-5" style="text-align: center;">Stress Chess Test For Children</h2>
                                <div class="cop">
                                   
                                    <h3> Please circle the answer that is correct for you </h3>
                                </div>
                                <div class="container">


                                    <form id="stressTestForm">
                                        <div class="question">
                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 1. In the Last Month, how often
                                                    have you been upset because of something that happened
                                                    unexpectedly? <sup style="color: red;">*</sup> <span
                                                        class="d-inline-block"></span></h3>
                                            </div>
                                            <!-- <p class="required"></p> -->
                                            <div class="radio-group">
                                                <label><input type="radio" name="q1" value="0" required> Never</label>
                                                <label><input type="radio" name="q1" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q1" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q1" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q1" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">

                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 2. In the Last Month, how often
                                                    have you felt that you
                                                    were unable to control important things in your life? <sup
                                                        style="color: red;">*</sup> <span class="d-inline-block"></span>
                                                </h3>
                                            </div>
                                            <div class="radio-group">
                                                <label><input type="radio" name="q2" value="0" required> Never</label>
                                                <label><input type="radio" name="q2" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q2" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q2" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q2" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">

                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 3. In the Last Month, how often
                                                    have you felt nervous
                                                    and 'stressed'?<sup style="color: red;">*</sup> <span
                                                        class="d-inline-block"></span></h3>
                                            </div>
                                            <div class="radio-group">
                                                <label><input type="radio" name="q3" value="0" required> Never</label>
                                                <label><input type="radio" name="q3" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q3" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q3" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q3" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">

                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required">4. In the Last Month, how often
                                                    have you felt confident
                                                    about your ability to handle your personal problems?<sup
                                                        style="color: red;">*</sup> <span class="d-inline-block"></span>
                                                </h3>
                                            </div>


                                            <div class="radio-group">
                                                <label><input type="radio" name="q4" value="0" required> Never</label>
                                                <label><input type="radio" name="q4" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q4" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q4" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q4" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">



                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 5. In the Last Month, how often
                                                    have you felt that
                                                    things were going your way?<sup style="color: red;">*</sup> <span
                                                        class="d-inline-block"></span></h3>
                                            </div>


                                            <div class="radio-group">
                                                <label><input type="radio" name="q5" value="0" required> Never</label>
                                                <label><input type="radio" name="q5" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q5" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q5" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q5" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">


                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 6. In the Last Month, how often
                                                    have you found that you
                                                    could NOT cope with all the things you had to do?<sup
                                                        style="color: red;">*</sup> <span class="d-inline-block"></span>
                                                </h3>
                                            </div>


                                            <div class="radio-group">
                                                <label><input type="radio" name="q6" value="0" required> Never</label>
                                                <label><input type="radio" name="q6" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q6" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q6" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q6" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">


                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required">7. In the Last Month, how often
                                                    have you been able to
                                                    control irritations in your life?<sup style="color: red;">*</sup>
                                                    <span class="d-inline-block"></span>
                                                </h3>
                                            </div>


                                            <div class="radio-group">
                                                <label><input type="radio" name="q7" value="0" required> Never</label>
                                                <label><input type="radio" name="q7" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q7" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q7" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q7" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">

                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required">8. In the Last Month, how often
                                                    have you felt that you
                                                    were on top of things?<sup style="color: red;">*</sup> <span
                                                        class="d-inline-block"></span></h3>
                                            </div>


                                            <div class="radio-group">
                                                <label><input type="radio" name="q8" value="0" required> Never</label>
                                                <label><input type="radio" name="q8" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q8" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q8" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q8" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">


                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 9. In the Last Month, how often
                                                    have you been angered
                                                    because of things that happened that were out of your control?<sup
                                                        style="color: red;">*</sup> <span class="d-inline-block"></span>
                                                </h3>
                                            </div>


                                            <div class="radio-group">
                                                <label><input type="radio" name="q9" value="0" required> Never</label>
                                                <label><input type="radio" name="q9" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q9" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q9" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q9" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <div class="question">


                                            <div class="comment-reply-wrap">
                                                <h3 class="position-relative required"> 10. In the Last Month, how often
                                                    have you felt
                                                    difficulties were piling up so high that you could not overcome
                                                    them?<sup style="color: red;">*</sup> <span
                                                        class="d-inline-block"></span></h3>
                                            </div>


                                            <div class="radio-group non">
                                                <label><input type="radio" name="q10" value="0" required> Never</label>
                                                <label><input type="radio" name="q10" value="1" required> Almost
                                                    Never</label>
                                                <label><input type="radio" name="q10" value="2" required>
                                                    Sometimes</label>
                                                <label><input type="radio" name="q10" value="3" required> Fairly
                                                    Often</label>
                                                <label><input type="radio" name="q10" value="4" required> Very
                                                    Often</label>
                                            </div>
                                        </div>

                                        <button type="button" class="new-be" id="submitTest">Get Your Stress
                                            Score</button>
                                    </form>

                                    <div class="baa">
                                        <div id="result"></div>
                                        <div class="meter-container">
                                            <svg class="meter" viewBox="0 0 200 200">
                                                <circle class="circle-bg" cx="100" cy="100" r="90" stroke-width="20" />
                                                <circle class="circle-fill" cx="100" cy="100" r="90"
                                                    stroke-width="20" />
                                            </svg>
                                            <div id="meterLevel" class="meter-level">0%</div>
                                        </div>

                                        <!-- Static Table for Stress Scores -->
                                        <div class="static-table-container">
                                            <h3 style="color: #ffb000; margin-bottom: 3%;text-align: center;">Stress Score Summary</h3>
                                            <table class="static-table">
                                                <thead>
                                                    <tr>
                                                        <th>Stress Level</th>
                                                        <th>Score Range</th>
                                                        <th>Percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Low Stress</td>
                                                        <td>0 - 10</td>
                                                        <td>20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Moderate Stress</td>
                                                        <td>11 - 20</td>
                                                        <td>60%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>High Stress</td>
                                                        <td>21 - 40</td>
                                                        <td>100%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- checkout-section end -->
            </div>
        </section>
        <!--end-->

            <!-- site-main start -->
            <div class="site-main" style="display:none;">

                <!--service-section-->
                <section class="prt-row service-section01 clearfix tikk">
                    <div class="container yes">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cop">
                                    <h3> Please circle the answer that is correct for you </h3>
                                </div>
                                <div class="container">


                                    <form id="stressTestForm">
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">1. How often do you turn to food for comfort when you’re feeling stressed or upset? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q1" value="1" required> Never</label>
                                <label><input type="radio" name="q1" value="2" required> Rarely</label>
                                <label><input type="radio" name="q1" value="3" required> Sometimes</label>
                                <label><input type="radio" name="q1" value="4" required> Often</label>
                                <label><input type="radio" name="q1" value="5" required> Always</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">2. Do you find that you overeat or binge eat when you’re feeling emotional (e.g., upset, anxious, or sad)?
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q2" value="1" required> Never</label>
                                <label><input type="radio" name="q2" value="2" required> Rarely</label>
                                <label><input type="radio" name="q2" value="3" required> Sometimes</label>
                                <label><input type="radio" name="q2" value="4" required> Often</label>
                                <label><input type="radio" name="q2" value="5" required> Always</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">3. How balanced is your diet on a typical day, considering all food groups (fruits, vegetables, proteins, grains, etc.)? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q3" value="1" required> Very balanced</label>
                                <label><input type="radio" name="q3" value="2" required> Somewhat balanced</label>
                                <label><input type="radio" name="q3" value="3" required> Neutral</label>
                                <label><input type="radio" name="q3" value="4" required> Unbalanced</label>
                                <label><input type="radio" name="q3" value="5" required> Very unbalanced</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">4. How often do you skip meals due to stress or a busy schedule? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q4" value="1" required> Never</label>
                                <label><input type="radio" name="q4" value="2" required> Rarely</label>
                                <label><input type="radio" name="q4" value="3" required> Sometimes</label>
                                <label><input type="radio" name="q4" value="4" required> Often</label>
                                <label><input type="radio" name="q4" value="5" required> Always</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">5. Do you experience cravings for sugary or high-fat foods when you’re stressed? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q5" value="1" required> Never</label>
                                <label><input type="radio" name="q5" value="2" required> Rarely</label>
                                <label><input type="radio" name="q5" value="3" required> Sometimes</label>
                                <label><input type="radio" name="q5" value="4" required> Often</label>
                                <label><input type="radio" name="q5" value="5" required> Always</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">6. How do you typically feel after eating when you're upset? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q6" value="1" required> Satisfied</label>
                                <label><input type="radio" name="q6" value="2" required> Neutral</label>
                                <label><input type="radio" name="q6" value="3" required> Guilty</label>
                                <label><input type="radio" name="q6" value="4" required> Still upset</label>
                                <label><input type="radio" name="q6" value="5" required> Physically uncomfortable</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">7. How aware are you of your eating habits when you're under stress? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q7" value="1" required> Very aware</label>
                                <label><input type="radio" name="q7" value="2" required> Somewhat aware</label>
                                <label><input type="radio" name="q7" value="3" required> Neutral</label>
                                <label><input type="radio" name="q7" value="4" required> Not very aware</label>
                                <label><input type="radio" name="q7" value="5" required> Not aware at all</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">8. How often do you eat on the go or while multitasking (e.g., working, watching TV)?
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q8" value="1" required> Never</label>
                                <label><input type="radio" name="q8" value="2" required> Rarely</label>
                                <label><input type="radio" name="q8" value="3" required> Sometimes</label>
                                <label><input type="radio" name="q8" value="4" required> Often</label>
                                <label><input type="radio" name="q8" value="5" required> Always</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">9. Do you take time to plan and prepare healthy meals even when you’re feeling stressed?
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q9" value="1" required> Always</label>
                                <label><input type="radio" name="q9" value="2" required> Often</label>
                                <label><input type="radio" name="q9" value="3" required> Sometimes</label>
                                <label><input type="radio" name="q9" value="4" required> Rarely</label>
                                <label><input type="radio" name="q9" value="5" required> Never</label>
                            </div>
    </div>
                    
                        <div class="question">
                            <div class="comment-reply-wrap">
                                <h3 class="position-relative required">10. On a scale of 1 to 10, how much does stress impact your overall nutrition and eating habits? 
                                <!--<sup style="color: red;">*</sup>-->
                                </h3>
                            </div>
                            <div class="radio-group">
                                <label><input type="radio" name="q10" value="1" required> 1-2 (Minimal impact)</label>
                                <label><input type="radio" name="q10" value="2" required> 3-4 (Low impact)</label>
                                <label><input type="radio" name="q10" value="3" required> 5-6 (Moderate impact)</label>
                                <label><input type="radio" name="q10" value="3" required> 7-8 (High impact) (4)
                                </label>
                                 <label><input type="radio" name="q10" value="3" required> 9-10 (Severe impact) (5)</label>
                         </div>
        </div>
                        <button type="button" class="new-be" id="submitTest">Get Your Stress
                                            Score</button>
                        </form>                          

                                    <div class="baa">
                                        <div id="result"></div>
                                        <div class="meter-container">
                                            <svg class="meter" viewBox="0 0 200 200">
                                                <circle class="circle-bg" cx="100" cy="100" r="90" stroke-width="20" />
                                                <circle class="circle-fill" cx="100" cy="100" r="90"
                                                    stroke-width="20" />
                                            </svg>
                                            <div id="meterLevel" class="meter-level">0%</div>
                                        </div>

                                        <!-- Static Table for Stress Scores -->
                                        <!-- Static Table for Stress Scores -->
<div class="static-table-container">
    <h3 style="color: #57aa46; margin-bottom: 3%; text-align: center;">Stress Score Summary</h3>
    <table class="static-table">
        <thead>
            <tr>
                <th>Stress Impact on Eating Habits</th>
                <th>Score Range</th>
                <th>Percentage</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Low stress impact</td>
                <td>10 - 20</td>
                <td>20%</td>
            </tr>
            <tr>
                <td>Moderate stress impact</td>
                <td>21 - 30</td>
                <td>50%</td>
            </tr>
            <tr>
                <td>High stress impact</td>
                <td>31 - 40</td>
                <td>75%</td>
            </tr>
            <tr>
                <td>Severe stress impact</td>
                <td>41 - 50</td>
                <td>100%</td>
            </tr>
        </tbody>
    </table>
</div>


                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!--service-section end-->

           

            </div><!-- site-main end-->
<script>
    document.getElementById('submitTest').addEventListener('click', () => {
    const form = document.getElementById('stressTestForm');
    const formData = new FormData(form);
    const answers = Array.from(formData.values()).map(Number);

    if (answers.length < 10) {
        document.getElementById('result').textContent = 'Please answer all questions.';
        return;
    }

    const totalScore = answers.reduce((acc, score) => acc + score, 0);
    let stressImpact;
    let percentage;

    if (totalScore <= 20) {
        stressImpact = 'Low stress impact on eating habits';
        percentage = 20;
    } else if (totalScore <= 30) {
        stressImpact = 'Moderate stress impact on eating habits';
        percentage = 50;
    } else if (totalScore <= 40) {
        stressImpact = 'High stress impact on eating habits';
        percentage = 75;
    } else if (totalScore <= 50) {
        stressImpact = 'Severe stress impact on eating habits';
        percentage = 100;
    }

    document.getElementById('result').textContent = `Your total score is ${totalScore}. ${stressImpact}`;

    const meterFill = document.querySelector('.circle-fill');
    const radius = 90; // Radius of the circle
    const circumference = 2 * Math.PI * radius; // Circumference
    const offset = circumference - (percentage / 100) * circumference; // Calculate offset

    meterFill.style.strokeDashoffset = offset;
    document.getElementById('meterLevel').textContent = `${percentage}%`;
});

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
        document.getElementById('submitTest').addEventListener('click', () => {
            const form = document.getElementById('stressTestForm');
            const formData = new FormData(form);
            const answers = Array.from(formData.values()).map(Number);

            if (answers.length < 10) {
                document.getElementById('result').textContent = 'Please answer all questions.';
                return;
            }

            const totalScore = answers.reduce((acc, score) => acc + score, 0);
            let stressLevel;
            let percentage;

            if (totalScore <= 10) {
                stressLevel = 'Low Stress';
                percentage = 20;
            } else if (totalScore <= 20) {
                stressLevel = 'Moderate Stress';
                percentage = 60;
            } else {
                stressLevel = 'High Stress';
                percentage = 100;
            }

            document.getElementById('result').textContent = `Your total score is ${totalScore}. Stress Level: ${stressLevel}`;

            const meterFill = document.querySelector('.circle-fill');
            const radius = 90; // Radius of the circle
            const circumference = 2 * Math.PI * radius; // Circumference
            const offset = circumference - (percentage / 100) * circumference; // Calculate offset

            meterFill.style.strokeDashoffset = offset;
            document.getElementById('meterLevel').textContent = `${percentage}%`;
        });
    </script>

@endsection

<!--scri-->
