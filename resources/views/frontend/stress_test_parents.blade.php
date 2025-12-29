@extends('frontend.layouts.app')
@section('title') {{ 'About Us' }} @endsection
@section('content')

<style>

    .thm-btn:hover {
        color: #000 !important; 
        background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
    }

        .static-table-container {
            margin-top: 30px;
            padding: 5px;
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
          display: flex;
          flex-direction: row;
          gap: 6px;
          margin-top: 8px;
         
        }
        
        .radio-group label {
          display: flex;
          align-items: center;
          gap: 10px; /* space between radio and label text */
          font-size: 16px;
           font-weight: 600;
            font-size: 18px;
        }
        
        .radio-group input[type="radio"] {
          margin: 0;
          accent-color: #007bff; /* optional: gives a nice blue highlight */
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
            padding: 3px;
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
    padding: 3px;
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


@media(max-width:786px){
.comments-wrap>h3, .comment-reply-wrap>h3
 {

    text-align: left;
}
.static-table-container
 {
    margin-top: 30px;
    padding: 3px;}
    
.radio-group{
    flex-direction: column !important;
}
    
}
    </style>
    <section>
            <div class="w-100 pt-80  position-relative">
                <!--For Parents-->
                <!-- checkout-section -->
                <section class="ttm-row checkout-section tohh break-991-colum clearfix">
                    <div class="container yes">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="mb-5" style="text-align: center;">Stress Chess Test For Parents</h2>
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
                                        <div class="static-table-container ">
                                            <h3 style="color: #ffb000; margin-bottom: 3%;text-align: center;">Stress Score Summary</h3>
                                            <div class="table-responsive">
                                               <table class="static-table ">
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
                                        
                                            <div style="text-align: center;" >
                                                <a href="{{ route('front.contact') }}" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden custom-hover" style="text-align: center; margin-top: 5%; color:#000;">Your mind matters,Let’s talk</a>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection



