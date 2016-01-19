<?php 

class StudyquestionsTableSeeder extends Seeder {

    public function run()
    {
        $question1 = new Studyquestion();
        $question1->studyquestion = 'Mercury'; 
        $question1->studyanswer = 'Mercúrio';
        $question1->studylist_id = 1;
        $question1->save();

        $question2 = new Studyquestion();
        $question2->studyquestion = 'Venus'; 
        $question2->studyanswer = 'Vênus';
        $question2->studylist_id = 1;
        $question2->save();

        $question3 = new Studyquestion();
        $question3->studyquestion = 'Earth'; 
        $question3->studyanswer = 'Terra';
        $question3->studylist_id = 1;
        $question3->save();

        $question4 = new Studyquestion();
        $question4->studyquestion = 'Mars'; 
        $question4->studyanswer = 'Marte';
        $question4->studylist_id = 1;
        $question4->save();

        $question5 = new Studyquestion();
        $question5->studyquestion = 'Jupiter'; 
        $question5->studyanswer = 'Júpiter';
        $question5->studylist_id = 1;
        $question5->save();

        $question6 = new Studyquestion();
        $question6->studyquestion = 'Delaware'; 
        $question6->studyanswer = 'Dover';
        $question6->studylist_id = 2;
        $question6->save();

        $question7 = new Studyquestion();
        $question7->studyquestion = 'Florida'; 
        $question7->studyanswer = 'Tallahassee';
        $question7->studylist_id = 2;
        $question7->save();

        $question8 = new Studyquestion();
        $question8->studyquestion = 'Iowa'; 
        $question8->studyanswer = 'Des Moines';
        $question8->studylist_id = 2;
        $question8->save();

        $question9 = new Studyquestion();
        $question9->studyquestion = 'Kansas'; 
        $question9->studyanswer = 'Topeka';
        $question9->studylist_id = 2;
        $question9->save();

        $question10 = new Studyquestion();
        $question10->studyquestion = 'Texas'; 
        $question10->studyanswer = 'Austin';
        $question10->studylist_id = 2;
        $question10->save();

        $question11 = new Studyquestion();
        $question11->studyquestion = 'Michigan'; 
        $question11->studyanswer = 'American Robin';
        $question11->studylist_id = 3;
        $question11->save();

        $question12 = new Studyquestion();
        $question12->studyquestion = 'Pennsylvania'; 
        $question12->studyanswer = 'Ruffed Grouse';
        $question12->studylist_id = 3;
        $question12->save();

        $question13 = new Studyquestion();
        $question13->studyquestion = 'Hawaii'; 
        $question13->studyanswer = 'Hawaiian Goose';
        $question13->studylist_id = 3;
        $question13->save();

        $question14 = new Studyquestion();
        $question14->studyquestion = 'Utah'; 
        $question14->studyanswer = 'California Gull';
        $question14->studylist_id = 3;
        $question14->save();

        $question15 = new Studyquestion();
        $question15->studyquestion = 'Arizona'; 
        $question15->studyanswer = 'Cactus Wren';
        $question15->studylist_id = 3;
        $question15->save();

        $question16 = new Studyquestion();
        $question16->studyquestion = 'Hungary'; 
        $question16->studyanswer = 'Budapest';
        $question16->studylist_id = 4;
        $question16->save();

        $question17 = new Studyquestion();
        $question17->studyquestion = 'Germany'; 
        $question17->studyanswer = 'Berlin';
        $question17->studylist_id = 4;
        $question17->save();

        $question18 = new Studyquestion();
        $question18->studyquestion = 'Iceland'; 
        $question18->studyanswer = 'Reykjavík';
        $question18->studylist_id = 4;
        $question18->save();

        $question19 = new Studyquestion();
        $question19->studyquestion = 'Liechtenstein'; 
        $question19->studyanswer = 'Vaduz';
        $question19->studylist_id = 4;
        $question19->save();

        $question20 = new Studyquestion();
        $question20->studyquestion = 'Italy'; 
        $question20->studyanswer = 'Rome';
        $question20->studylist_id = 4;
        $question20->save();

        $question21 = new Studyquestion();
        $question21->studyquestion = 'feliz'; 
        $question21->studyanswer = 'happy';
        $question21->studylist_id = 5;
        $question21->save();

        $question22 = new Studyquestion();
        $question22->studyquestion = 'listo'; 
        $question22->studyanswer = 'ready';
        $question22->studylist_id = 5;
        $question22->save();

        $question23 = new Studyquestion();
        $question23->studyquestion = 'ocupado'; 
        $question23->studyanswer = 'busy';
        $question23->studylist_id = 5;
        $question23->save();

        $question24 = new Studyquestion();
        $question24->studyquestion = 'triste'; 
        $question24->studyanswer = 'sad';
        $question24->studylist_id = 5;
        $question24->save();

        $question25 = new Studyquestion();
        $question25->studyquestion = 'cansado'; 
        $question25->studyanswer = 'tired';
        $question25->studylist_id = 5;
        $question25->save();
    }
}