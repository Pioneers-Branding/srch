@extends('frontend.layouts.app')
@section('title') {{ 'Coaches' }} @endsection

<style>
.cdetails{
  display: contents;  
}
    


.cdetails .container {
    max-width: 1200px;
    margin: 15px auto;
    padding: 20px;
}

.cdetails .row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 50px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Column styling */
.cdetails .column {
    flex: 1;
    padding: 10px;
}

.cdetails .image-col {
    flex: 1;
    text-align: center;
}

.cdetails .content-col {
    flex: 1;
}

.cdetails profiles {
    max-width: 450px;
    height: auto;
    border-radius: 5px;
}

/* Text styling */
.cdetails h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.cdetails h3 {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 15px;
}

.cdetails p {
    font-size: 1rem;
    text-align: justify;
    line-height: 1.8;
}

/* Reverse the layout for alternate rows */
.cdetails .reverse {
    flex-direction: row-reverse;
}

/* Responsive styles */
@media (max-width: 768px) {
   .cdetails .row {
        flex-direction: column;
        text-align: center;
    }
   .cdetails .reverse {
        flex-direction: column;
    }
.cdetails.content-col {
        margin-top: 20px;
    }
    .cdetails .profiles {
        max-width: 80%;
    }
}

@media (max-width: 480px) {
   .cdetails h1 {
        font-size: 1.5rem;
    }
   .cdetails h3 {
        font-size: 1rem;
    }
   .cdetails p {
        font-size: 0.95rem;
    }
}

</style>
@section('content')

<section>

<div class="cdetails">
    <div class="container">
        <!-- Row 1 -->
        <div class="row">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/hemant_sharma.jpg')}}" alt="Hemant Sharma" class="profiles">
            </div>
            <div class="column content-col">
                <h1>IM Hemant Sharma</h1>
                <h3>Intermediate Batch</h3>
                <p>
                    Hemant Sharma is an International Master (IM) and FIDE Trainer (FT) based in New Delhi, India, with over two decades of chess experience since 1999. He has notable achievements such as winning India’s Under-25 Championship in 2010, securing the Best Rating Category Prize at the Gibraltar Masters in 2018, and earning a Bronze Medal at the Dubai Junior Chess Championship in 2005. Hemant has participated in prestigious international tournaments, including the Paris Open, Isle of Man Masters, and Zalakaros International Chess Championship, achieving his IM title in 2017. As a coach since 2016, he has trained students worldwide, including notable players like IM Dushyant Sharma, GM Pranav Anand, and FM Rosh Jain. Hemant also served as the coach for Team Sao Tome & Principe at the 2022 Chess Olympiad and continues to guide students ranging from beginner to 2300 standard rating.
                </p>
            </div>
        </div>

        <!-- Row 2 (zigzag: reverse image and content) -->
        <div class="row reverse">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/tejas_bakre.jpg')}}" alt="Tejas Bakre" class="profiles">
            </div>
            <div class="column content-col">
                <h1>GM Tejas Bakre</h1>
                <h3>Advanced Batch</h3>
                <p>
                   Tejas Bakre became a Grandmaster in 2004, the first from Gujarat and 11th in India. He is also a FIDE Senior Trainer. His key achievements include winning the Asian Sub-Junior Championship in 1997, the Asian Junior Championship twice, and three gold medals at the 1998 World Youth Olympics. He has represented India globally, earning awards from the Sports Ministry and setting a Guinness World Record in 2010. As a coach, Tejas has trained numerous top players, including Grandmaster norm holders and International Masters. His student Hetul Shah set a Guinness World Record by defeating a Grandmaster at age 9. Tejas also coached Team India at the 2022 Chess Olympiad. Most recently his student IM Vantika Agrawal won a gold medal at the recently concluded Chess Olympiad. 

                </p>
            </div>
        </div>

        <!-- Repeat similar rows for the rest -->
        
        <!-- Row 3 -->
        <div class="row">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/yogender_prakash.jpg')}}" alt="Yogender Prakash" class="profiles">
            </div>
            <div class="column content-col">
                <h1>NI Yogender Prakash</h1>
                <h3>Freshers/ Beginners Batch</h3>
                <p>
                    Yogender Prakash is a FIDE-certified chess coach and an active Chess player, with notable achievements, including securing top positions in Delhi University chess tournaments and state-level competitions. He won 1st place at the Delhi University (South Campus) Tournament in 2013 and Hindu College Tournament in 2012, and placed 3rd at the BITS Pilani Chess Festival in 2012. He also participated in the Delhi University Inter-College Chess Championships from 2010-2012.With over 13 years of coaching experience, Yogender has been training students at St. Mary's School, Safdarjung Enclave for the last two years. He also serves as a coach at other academies and has previously worked with DPS Noida, Sadhu Vaswani, and Presidium School. Many of his students have become rated players, excelling at both state and national levels.

                </p>
            </div>
        </div>

        <!-- Row 4 (reverse) -->
        <div class="row reverse">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/vishal_sareen.jpg')}}" alt="Vishal Sareen" class="profiles">
            </div>
            <div class="column content-col">
                <h1>IM Vishal Sareeen </h1>
                <h3>Advanced Batch
</h3>
                <p>
                    IM Vishal Sareen is an accomplished International Master and globally renowned chess coach from India. He earned his IM title in the 1990s and has represented India in several prestigious international tournaments throughout his career. Beyond his success as a player, Vishal is highly respected for his coaching prowess, having trained many top Indian players, including GM Parimarjan Negi, IM Tanya Sachdev, and GM Sahaj Grover. With decades of experience, Vishal is a FIDE Senior Trainer and has contributed immensely to the growth of Indian chess. He has been instrumental in nurturing young talent and guiding them to success at national and international levels. His expertise and dedication have made him a key figure in the Indian chess community, and he continues to inspire the next generation of chess players.

                </p>
            </div>
        </div>

        <!-- Row 5 -->
        <div class="row">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/1.jpeg')}}" alt="Shivika Rohilla" class="profiles">
            </div>
            <div class="column content-col">
                <h1>Shivika Rohilla
</h1>
                <h3>Women Fide Master (WFM)</h3>
                <p>
                    Shivika Rohilla is a Woman Fide Master and has been among the top 100 junior girls in the world. She is a talented chess player and is well known for her remarkable achievements in the chess world. She has competed at various national and international tournaments, consistently showcasing her skills and determination. Shivika has been instrumental in promoting chess among young players, emphasizing both competitive excellence and personal development. As a player, she focuses on nurturing the next generation of chess talent, providing them with the guidance and support needed to excel. Shivika's passion for the game and commitment to fellow players has made her a respected figure in the chess community, inspiring many aspiring players to pursue their dreams in the sport.

                </p>
            </div>
        </div>
        
         <!-- Row 6 (reverse) -->
        <div class="row reverse">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/Nanaki-Chadha.png')}}" alt="Dr. Nanaki Jahnavi Chadha" class="profiles">
            </div>
            <div class="column content-col">
                <h1>Dr. Nanaki Jahnavi Chadha
</h1>
                <h3>Sports Psychologist
</h3>
                <p>
                    Dr. Nanaki Jahnavi Chadha is a distinguished sport psychologist with a specialization in optimizing mental performance for chess players. Holding a PhD in sport psychology and backed by extensive applied experience, she is dedicated to enhancing players' psychological well-being through tailored interventions. Dr. Chadha focuses on equipping individuals with effective coping strategies to facilitate emotional regulation, helping them navigate the pressures of competitive play.
Her expertise spans both individual and team settings, where she delivers customized strategies aimed at maximizing performance. Recognized for her commitment to mental well-being in sports, Dr. Chadha is a sought-after expert within the chess community, empowering players to overcome psychological barriers and elevate their competitive potential.


                </p>
            </div>
        </div>


<!-- Row 7 -->
        <div class="row">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/yumna.jpg')}}" alt="Yumna Shamsi
" class="profiles">
            </div>
            <div class="column content-col">
                <h1>Yumna Shamsi

</h1>
                <h3>Nutritionist</h3>
                <p>
                   Yumna Shamsi is a dedicated nutritionist and the co-founder of Nutrihealth Genie, specializing in holistic health and wellness. With a degree in nutrition and a wealth of experience, she provides personalized dietary guidance aimed at enhancing overall well-being. Yumna is passionate about educating clients on the importance of balanced nutrition, helping them make informed food choices that align with their health goals. She focuses on creating tailored meal plans that consider individual preferences and lifestyles, promoting sustainable eating habits. Yumna's expertise encompasses various dietary needs, including weight management, sports nutrition, and wellness optimization, making her a trusted partner in her clients' health journeys.


                </p>
            </div>
        </div>
        <!-- Row 8 -->
         
        <div class="row reverse">
            <div class="column image-col">
                <img src="{{asset('frontend/assets/srcamain/images/Aradhya.jpeg')}}" alt="Dr. Nanaki Jahnavi Chadha" class="profiles">
            </div>
            <div class="column content-col">
                <h1>Dr. Nanaki Jahnavi Chadha
</h1>
                <h3>Sports Psychologist
</h3>
                <p>
                    Dr. Nanaki Jahnavi Chadha is a distinguished sport psychologist with a specialization in optimizing mental performance for chess players. Holding a PhD in sport psychology and backed by extensive applied experience, she is dedicated to enhancing players' psychological well-being through tailored interventions. Dr. Chadha focuses on equipping individuals with effective coping strategies to facilitate emotional regulation, helping them navigate the pressures of competitive play.
Her expertise spans both individual and team settings, where she delivers customized strategies aimed at maximizing performance. Recognized for her commitment to mental well-being in sports, Dr. Chadha is a sought-after expert within the chess community, empowering players to overcome psychological barriers and elevate their competitive potential.


                </p>
            </div>
        </div>

        
    </div>
</div>
        </section>
           


@endsection


