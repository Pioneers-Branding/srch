@extends('frontend.layouts.app')
@section('title') {{ 'Chess trivia' }} @endsection
@section('content')
<style>
.yes{
border: 2px solid #6c757d !important;
}
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
     <style>
            .trivia {
                margin-bottom: 20px;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                background-color: #fafafa;
            }

            .question {

                margin-bottom: 20px;
                font-size: 20px;
                color: #373737;
                font-weight: 800;
            }

            .options {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                /* Two options per row */
                gap: 10px;
                /* Space between options */
            }

            .option {
                padding: 15px;
                border: 1px solid #666666;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s;
                text-align: center;
                font-weight: 600;
                font-size: 17px;
            }

            .option:hover {
                background-color: #e9e9e9;
            }

            .option.correct {
                background-color: #d4edda;
                /* Light green */
                border-color: #c3e6cb;
                /* Green */
            }

            .option.incorrect {
                background-color: #f8d7da;
                /* Light red */
                border-color: #f5c6cb;
                /* Red */
            }

            .btn {
                background-color: #2980b9;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 1em;
                transition: background-color 0.3s;
            }

            .btn:hover {
                background-color: #1c598a;
            }

            .answer {
                margin-top: 15px;
                font-weight: bold;
                color: #2c3e50;
            }

            .result {
                margin-top: 20px;
                padding: 20px;

                border-radius: 10px;
                background-color: #f8f9fa;
                background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
                color: #fff;
                padding: 15px 24px 5px;
                border-radius: 10px;
            }

            .result h2 {
                color: #2c3e50;
            }

            .score {
                font-size: 37px;
                font-weight: 900;
                color: #fff;
            }



            .feedback {
                font-size: 1.2em;
                color: #333;
            }

            .coupon {
                background-color: #e7f9ff;
                border: 1px solid #b3e5fc;
                padding: 10px;
                border-radius: 5px;
                width: 50%;
                font-size: 20px;
                margin-left: 20%;
            }

            .answer {
                margin-top: 30px;
                font-weight: bold;
                font-size: 20px;
            }

            #result {
                margin-top: 10px;
                font-weight: bold;
                text-align: center;
                font-size: 31px;
                margin-bottom: 0px;
                color: #fff;
                padding-bottom: 50px;
                padding-top: 23px;
            }

            #feedback {
                font-size: 20px;
                padding-top: 12px;
                padding-bottom: 20px;
            }

            #copyButton {
                font-size: 20px;
                font-weight: 600;
                background: none !important;
                color: #2980b9;
                margin-top: 6px !important;
                margin-right: 21%;
            }

            .button-container {
                display: flex;
                justify-content: space-between;
                /* Space buttons to the left and right */
                margin-top: 20px;
                /* Add some space above the buttons */
            }

            @media (max-width: 678px) {
    .button-container {
        flex-direction: column; /* Stack buttons vertically */
        align-items: stretch; /* Stretch buttons to full width */
    }

    .btn {
        margin: 5px 0; /* Add margin between buttons */
        width: 100%; /* Full width for buttons */
    }

    .trivia {
        padding: 15px; /* Adjust padding for smaller screens */    
    }

    .question {
        font-size: 18px; /* Reduce font size for better readability */
    }

    .options {
        grid-template-columns: 1fr; /* Single column for options on mobile */
    }

    .option {
        font-size: 16px; /* Smaller font for options */
    }
    .coupon {
    background-color: #e7f9ff;
    border: 1px solid #b3e5fc;
    padding: 10px;
    border-radius: 5px;
    width: auto;
    font-size: 20px;
    margin-left: 0;
}
}
        </style>

         <style>
            .trivia {
                margin-bottom: 20px;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                background-color: #fafafa;
            }

            .question {

                margin-bottom: 20px;
                font-size: 20px;
                color: #373737;
                font-weight: 800;
            }

            .options {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                /* Two options per row */
                gap: 10px;
                /* Space between options */
            }

            .option {
                padding: 15px;
                border: 1px solid #666666;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s;
                text-align: center;
                font-weight: 600;
                font-size: 17px;
            }

            .option:hover {
                background-color: #e9e9e9;
            }

            .option.correct {
                background-color: #d4edda;
                /* Light green */
                border-color: #c3e6cb;
                /* Green */
            }

            .option.incorrect {
                background-color: #f8d7da;
                /* Light red */
                border-color: #f5c6cb;
                /* Red */
            }

            .btn {
                background-color: #2980b9;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                font-size: 1em;
                transition: background-color 0.3s;
            }

            .btn:hover {
                background-color: #1c598a;
            }

            .answer {
                margin-top: 15px;
                font-weight: bold;
                color: #2c3e50;
            }

            .result {
                margin-top: 20px;
                padding: 20px;

                border-radius: 10px;
                background-color: #f8f9fa;
                background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
                color: #fff;
                padding: 15px 24px 5px;
                border-radius: 10px;
            }

            .result h2 {
                color: #2c3e50;
            }

            .score {
                font-size: 37px;
                font-weight: 900;
                color: #fff;
            }



            .feedback {
                font-size: 1.2em;
                color: #333;
            }

            .coupon {
                background-color: #e7f9ff;
                border: 1px solid #b3e5fc;
                padding: 10px;
                border-radius: 5px;
                width: 50%;
                font-size: 20px;
                margin-left: 20%;
            }

            .answer {
                margin-top: 30px;
                font-weight: bold;
                font-size: 20px;
            }

            #result {
                margin-top: 10px;
                font-weight: bold;
                text-align: center;
                font-size: 31px;
                margin-bottom: 0px;
                color: #fff;
                padding-bottom: 50px;
                padding-top: 23px;
            }

            #feedback {
                font-size: 20px;
                padding-top: 12px;
                padding-bottom: 20px;
            }

            #copyButton {
                font-size: 20px;
                font-weight: 600;
                background: none !important;
                color: #2980b9;
                margin-top: 6px !important;
                margin-right: 21%;
            }

            .button-container {
                display: flex;
                justify-content: space-between;
                /* Space buttons to the left and right */
                margin-top: 20px;
                /* Add some space above the buttons */
            }
            
            .coupon {
    background-color: #e7f9ff;
    border: 1px solid #b3e5fc;
    padding: 10px;
    border-radius: 5px;
    width: 50%;
    font-size: 20px;
    margin: auto !important;
    margin-left:0 !important;
        float: none !important;
            display: inline-block  !important ;
}

            @media (max-width: 678px) {
    .button-container {
        flex-direction: column; /* Stack buttons vertically */
        align-items: stretch; /* Stretch buttons to full width */
    }

    .btn {
        margin: 5px 0; /* Add margin between buttons */
        width: 100%; /* Full width for buttons */
    }

    .trivia {
        padding: 15px; /* Adjust padding for smaller screens */    
    }

    .question {
        font-size: 18px; /* Reduce font size for better readability */
    }

    .options {
        grid-template-columns: 1fr; /* Single column for options on mobile */
    }

    .option {
        font-size: 16px; /* Smaller font for options */
    }
    .coupon {
    background-color: #e7f9ff;
    border: 1px solid #b3e5fc;
    padding: 10px;
    border-radius: 5px;
    width: auto;
    font-size: 20px;
    margin-left: 0;
}
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
                                <h2 class="mb-5" style="text-align: center;">Chess Trivia: Checkmate Your Knowledge</h2>
                                <div class="container">
                                    <div class="trivia" id="trivia">
                                        <div class="comment-reply-wrap">
                                            <h3 class="question position-relative" id="question"></h3>
                                        </div>
                                        <div class="options" id="options"></div>
                                    </div>

                                    <div class="button-container">
                                        <button id="previousBtn" class="btn">Previous Question</button>
                                        <button id="nextBtn" class="btn">Next Question</button>
                                    </div>

                                    <div class="answer" id="answer" style="display: none;"></div>
                                    <div class="result" id="result" style="display: none;">
                                        <h2>Your Results</h2>
                                        <div class="score" id="score"></div>
                                        <div id="feedback"></div>
                                        <div class="coupon" id="coupon"
                                            style="margin-top: 15px; font-weight: bold; color: #2980b9;"></div>
                                        <button id="copyButton" class="btn d-none" style="margin-top: 10px;">
                                            <img src="assets/images/paste.png" alt="Copy"
                                                style="width: 50px; height: 50px; vertical-align: middle;" />
                                        </button>
                                    </div>
                                     <!-- Timer Display -->
                                    <div id="timer" style="text-align: center; font-size: 20px; margin-top: 20px;">
                                        Time Remaining: <span id="time"></span>
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
    const questions = {!! json_encode($quizes->map(function($quiz) {
        return [
            'question' => $quiz->question,
            'options' => $quiz->options, 
            'answer' => $quiz->correct_answer, 
        ];
    })) !!};

    let currentQuestion = 0;
    let score = 0;
    let timer;
    let allAnswersCorrect = true;

    // Set total quiz time (5 minutes = 300 seconds)
    let timeRemaining = 5 * 60;

    // Function to update the timer display
    function updateTimer() {
        if (timeRemaining > 0) {
            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;
            document.getElementById('time').textContent = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
            timeRemaining--;
        } else {
            endQuiz();
        } 
    }

    // Start the timer
    timer = setInterval(updateTimer, 1000);

    // Function to stop timer & show "Play Again to Win"
    function endQuiz() {
        clearInterval(timer); // Stop the timer completely
        document.getElementById('timer').innerHTML = `<span style="color: red; font-weight: bold;    text-transform: uppercase; ">Play Again to Win</span>`;
        displayResult();
    }

    function loadQuestion() { 
        document.getElementById('question').textContent = questions[currentQuestion].question;
        const optionsDiv = document.getElementById('options');
        optionsDiv.innerHTML = '';

        questions[currentQuestion].options.forEach((option, index) => {
            const optionDiv = document.createElement('div');
            optionDiv.textContent = option;
            optionDiv.className = 'option';
            optionDiv.addEventListener('click', () => selectAnswer(index, optionDiv));
            optionsDiv.appendChild(optionDiv);
        });
    }

    function selectAnswer(selectedIndex, optionDiv) {
        const answerDiv = document.getElementById('answer');
        const correctIndex = questions[currentQuestion].answer;

        if (selectedIndex == correctIndex) {
            answerDiv.textContent = "Correct!";
            optionDiv.classList.add('correct');
            score++;
        } else {
            answerDiv.textContent = "Incorrect.";
            optionDiv.classList.add('incorrect');
            const correctOptionDiv = document.querySelectorAll('.option')[correctIndex];
            correctOptionDiv.classList.add('correct');
            answerDiv.innerHTML += `<br/>The correct answer is: ${questions[currentQuestion].options[correctIndex]}`;
            allAnswersCorrect = false;
        }
        answerDiv.style.display = 'block';
    }

    document.getElementById('nextBtn').addEventListener('click', function () {
        currentQuestion++;
        if (currentQuestion < questions.length) {
            loadQuestion();
            document.getElementById('answer').style.display = 'none';
        } else {
            document.getElementById('trivia').style.display = 'none';
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('previousBtn').style.display = 'none';
            document.getElementById('answer').style.display = 'none';
            endQuiz(); // Call endQuiz() when all questions are completed
        }
    });

    document.getElementById('previousBtn').addEventListener('click', function () {
        if (currentQuestion > 0) {
            currentQuestion--;
            loadQuestion();
            document.getElementById('answer').style.display = 'none';
        }
    });

    function displayResult() {
        const resultDiv = document.getElementById('result');
        const scoreDiv = document.getElementById('score');
        const feedbackDiv = document.getElementById('feedback');
        const couponDiv = document.getElementById('coupon');
        const copyButton = document.getElementById('copyButton');

        scoreDiv.textContent = "Your final score: " + score + " out of " + questions.length;

        if (score === questions.length) {
            feedbackDiv.textContent = "Congratulations! You win the test!";
        } else if (score >= questions.length / 2) {
            feedbackDiv.textContent = "Good job! You have a solid understanding of chess!";
        } else {
            feedbackDiv.textContent = "Keep practicing! You can improve your chess knowledge.";
        }

        if (allAnswersCorrect) {
            couponDiv.textContent = "Your coupon code: " + generateCoupon();
        } else {
            couponDiv.textContent = "Try again next time!";
        }

        copyButton.onclick = function () {
            navigator.clipboard.writeText(couponCode)
                .then(() => alert('Coupon code copied to clipboard!'))
                .catch(err => console.error('Failed to copy: ', err));
        };

        resultDiv.style.display = 'block';
    }

    function generateCoupon() {
        return "{{ $coupon->code }}";
    }

    loadQuestion();
</script>


@endsection


