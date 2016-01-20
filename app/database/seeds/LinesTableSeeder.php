<?php 

class LinesTableSeeder extends Seeder {

    public function run()
    {
        $line1 = new Line();
        $line1->clue = 'Mercury'; 
        $line1->response = 'Mercúrio';
        $line1->sheet_id = 1;
        $line1->save();

        $line2 = new Line();
        $line2->clue = 'Venus'; 
        $line2->response = 'Vênus';
        $line2->sheet_id = 1;
        $line2->save();

        $line3 = new Line();
        $line3->clue = 'Earth'; 
        $line3->response = 'Terra';
        $line3->sheet_id = 1;
        $line3->save();

        $line4 = new Line();
        $line4->clue = 'Mars'; 
        $line4->response = 'Marte';
        $line4->sheet_id = 1;
        $line4->save();

        $line5 = new Line();
        $line5->clue = 'Jupiter'; 
        $line5->response = 'Júpiter';
        $line5->sheet_id = 1;
        $line5->save();

        $line6 = new Line();
        $line6->clue = 'Delaware'; 
        $line6->response = 'Dover';
        $line6->sheet_id = 2;
        $line6->save();

        $line7 = new Line();
        $line7->clue = 'Florida'; 
        $line7->response = 'Tallahassee';
        $line7->sheet_id = 2;
        $line7->save();

        $line8 = new Line();
        $line8->clue = 'Iowa'; 
        $line8->response = 'Des Moines';
        $line8->sheet_id = 2;
        $line8->save();

        $line9 = new Line();
        $line9->clue = 'Kansas'; 
        $line9->response = 'Topeka';
        $line9->sheet_id = 2;
        $line9->save();

        $line10 = new Line();
        $line10->clue = 'Texas'; 
        $line10->response = 'Austin';
        $line10->sheet_id = 2;
        $line10->save();

        $line11 = new Line();
        $line11->clue = 'Michigan'; 
        $line11->response = 'American Robin';
        $line11->sheet_id = 3;
        $line11->save();

        $line12 = new Line();
        $line12->clue = 'Pennsylvania'; 
        $line12->response = 'Ruffed Grouse';
        $line12->sheet_id = 3;
        $line12->save();

        $line13 = new Line();
        $line13->clue = 'Hawaii'; 
        $line13->response = 'Hawaiian Goose';
        $line13->sheet_id = 3;
        $line13->save();

        $line14 = new Line();
        $line14->clue = 'Utah'; 
        $line14->response = 'California Gull';
        $line14->sheet_id = 3;
        $line14->save();

        $line15 = new Line();
        $line15->clue = 'Arizona'; 
        $line15->response = 'Cactus Wren';
        $line15->sheet_id = 3;
        $line15->save();

        $line16 = new Line();
        $line16->clue = 'Hungary'; 
        $line16->response = 'Budapest';
        $line16->sheet_id = 4;
        $line16->save();

        $line17 = new Line();
        $line17->clue = 'Germany'; 
        $line17->response = 'Berlin';
        $line17->sheet_id = 4;
        $line17->save();

        $line18 = new Line();
        $line18->clue = 'Iceland'; 
        $line18->response = 'Reykjavík';
        $line18->sheet_id = 4;
        $line18->save();

        $line19 = new Line();
        $line19->clue = 'Liechtenstein'; 
        $line19->response = 'Vaduz';
        $line19->sheet_id = 4;
        $line19->save();

        $line20 = new Line();
        $line20->clue = 'Italy'; 
        $line20->response = 'Rome';
        $line20->sheet_id = 4;
        $line20->save();

        $line21 = new Line();
        $line21->clue = 'feliz'; 
        $line21->response = 'happy';
        $line21->sheet_id = 5;
        $line21->save();

        $line22 = new Line();
        $line22->clue = 'listo'; 
        $line22->response = 'ready';
        $line22->sheet_id = 5;
        $line22->save();

        $line23 = new Line();
        $line23->clue = 'ocupado'; 
        $line23->response = 'busy';
        $line23->sheet_id = 5;
        $line23->save();

        $line24 = new Line();
        $line24->clue = 'triste'; 
        $line24->response = 'sad';
        $line24->sheet_id = 5;
        $line24->save();

        $line25 = new Line();
        $line25->clue = 'cansado'; 
        $line25->response = 'tired';
        $line25->sheet_id = 5;
        $line25->save();
    }
}