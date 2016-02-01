<?php 

class LinesTableSeeder extends Seeder {

    public function run()
    {
        $line1 = new Line();
        $line1->clue = 'Carthage'; 
        $line1->response = 'an ancient city on the northern coast of Africa, famous for fighting against Rome in Punic Wars; the sequel was better.';
        $line1->sheet_id = 1;
        $line1->save();

        $line2 = new Line();
        $line2->clue = 'Constantinople'; 
        $line2->response = 'city established as new eastern capital of Roman Empire by emperor Constantine in AD 330; By coincidence Instanbul was once Constantinople.';
        $line2->sheet_id = 1;
        $line2->save();

        $line3 = new Line();
        $line3->clue = 'Pompeii'; 
        $line3->response = 'ancient city in southwestern Italy that was buried by the eruption of Mount Vesuvius; Jon Snow would survive this disaster only to... well, you know the wall.';
        $line3->sheet_id = 1;
        $line3->save();

        $line4 = new Line();
        $line4->clue = 'Londinium'; 
        $line4->response = 'Roman settlement founded in AD 43 on the site of what would be London, abandoned in 5th century; its Roman Legion would spark Arthurian legends.. maybe.';
        $line4->sheet_id = 1;
        $line4->save();

        $line5 = new Line();
        $line5->clue = 'Rome'; 
        $line5->response = 'founded by Romulus and Remus, from Kingdom to Republic to Empire to birthplace of Italian cuisine.. hmmm.. pizza.';
        $line5->sheet_id = 1;
        $line5->save();

        $line6 = new Line();
        $line6->clue = 'papyrus'; 
        $line6->response = 'a water-loving plant best known for being made into paper by the Egyptians; font used in Avatar.';
        $line6->sheet_id = 2;
        $line6->save();

        $line7 = new Line();
        $line7->clue = 'hieroglyphics'; 
        $line7->response = 'system of writing made up of thousands of picture symbols created by the ancient Egyptians';
        $line7->sheet_id = 2;
        $line7->save();

        $line8 = new Line();
        $line8->clue = 'embalming'; 
        $line8->response = 'process of preserving a person\'s (usually the pharaoh) body after death; involved pulling the brain out the nose; also used by mummy\'s to reconstitute themselves in modern day to excact their revenge.';
        $line8->sheet_id = 2;
        $line8->save();

        $line9 = new Line();
        $line9->clue = 'sarcophagus'; 
        $line9->response = 'stone coffin for mummified bodies; not at all creepy.';
        $line9->sheet_id = 2;
        $line9->save();

        $line10 = new Line();
        $line10->clue = 'pyramid'; 
        $line10->response = 'large structures built of brick or stone with four sides as burial sites or tombs for the pharaohs; there are between 113 and 138 identified pyramids; one was destroyed by the Transformers.';
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

        $line26 = new Line();
        $line26->clue = 'Chromosome'; 
        $line26->response = 'Part of the cellular structure in which genes are located';
        $line26->sheet_id = 6;
        $line26->save();

        $line27 = new Line();
        $line27->clue = 'Recessive Trait'; 
        $line27->response = 'When two alleles of the same gene expression are present. Since there is no dominant trait involved, there is nothing to mask the expression of the recessive trait';
        $line27->sheet_id = 6;
        $line27->save();

        $line28 = new Line();
        $line28->clue = 'Chlorophyll'; 
        $line28->response = 'Chlorophyll is the green pigment found in various plants, responsible for trapping light and “feeding” the plant during photosynthesis';
        $line28->sheet_id = 6;
        $line28->save();

        $line29 = new Line();
        $line29->clue = 'Photosynthesis'; 
        $line29->response = 'The process of plants converting light into energy';
        $line29->sheet_id = 6;
        $line29->save();

        $line30 = new Line();
        $line30->clue = 'Hybridization'; 
        $line30->response = 'Breeding techique that involves crossing dissimilar individuals to bring together the best traits of both organisms';
        $line30->sheet_id = 6;
        $line30->save();

        $line31 = new Line();
        $line31->clue = 'Recombinant DNA'; 
        $line31->response = 'DNA produced by combining DNA from different sources';
        $line31->sheet_id = 6;
        $line31->save();

        $line32 = new Line();
        $line32->clue = 'Genetic marker'; 
        $line32->response = 'Gene that makes it possible to distinguish bacteria that carry a plasmid with foreign DNA from those that don\'t';
        $line32->sheet_id = 6;
        $line32->save();

        $line33 = new Line();
        $line33->clue = 'Romulus & Remus'; 
        $line33->response = 'founders of Rome who supposedly were raised by a wolf; Romulus would go on to found the Romulan Empire in Star Trek';
        $line33->sheet_id = 7;
        $line33->save();

        $line34 = new Line();
        $line34->clue = 'Gauls'; 
        $line34->response = 'people that lived in the central part of Europe that were conquered by Julius Caesar';
        $line34->sheet_id = 7;
        $line34->save();

        $line35 = new Line();
        $line35->clue = 'Coliseum'; 
        $line35->response = 'a large arena in Rome where gladiator contests and other games and sporting events were held, supposedly even mock naval battles';
        $line35->sheet_id = 7;
        $line35->save();

        $line36 = new Line();
        $line36->clue = 'Pax Romana'; 
        $line36->response = 'a 200-year period of peace and stability established and maintained by the Roman Empire';
        $line36->sheet_id = 7;
        $line36->save();

        $line37 = new Line();
        $line37->clue = 'Byzantine Empire'; 
        $line37->response = 'the name for the eastern Roman Empire, located at the crossroads of Europe and Asia; it lasted from about 500 to 1453 C.E.';
        $line37->sheet_id = 7;
        $line37->save();

        $line38 = new Line();
        $line38->clue = 'Julius Caesar'; 
        $line38->response = 'a Roman general who ended the Roman Republic when he seized power and became dictator for life; legacy continues in salad form';
        $line38->sheet_id = 7;
        $line38->save();

        $line39 = new Line();
        $line39->clue = 'gladiator'; 
        $line39->response = 'A man trained to fight against other men of wild animals in an arena as a spectator sport, this was a practice in ancient Rome; a great Russell Crowe movie';
        $line39->sheet_id = 7;
        $line39->save();

        $line40 = new Line();
        $line40->clue = 'barbarian'; 
        $line40->response = 'A member of a community other than one of the great civilizations, the great civilizations were Greek, Roman, or Christian; their greatest ambassador was Conan';
        $line40->sheet_id = 7;
        $line40->save();

        $line41 = new Line();
        $line41->clue = 'la biblioteca'; 
        $line41->response = 'library';
        $line41->sheet_id = 5;
        $line41->save();

        $line42 = new Line();
        $line42->clue = 'la escuela'; 
        $line42->response = 'school';
        $line42->sheet_id = 5;
        $line42->save();

        $line43 = new Line();
        $line43->clue = 'la tienda'; 
        $line43->response = 'shop';
        $line43->sheet_id = 5;
        $line43->save();

        $line44 = new Line();
        $line44->clue = 'el estadio'; 
        $line44->response = 'stadium';
        $line44->sheet_id = 5;
        $line44->save();

        $line45 = new Line();
        $line45->clue = 'Spain'; 
        $line45->response = 'Madrid';
        $line45->sheet_id = 4;
        $line45->save();

        $line46 = new Line();
        $line46->clue = 'Romania'; 
        $line46->response = 'Bucharest';
        $line46->sheet_id = 4;
        $line46->save();

        $line47 = new Line();
        $line47->clue = 'Latvia'; 
        $line47->response = 'Riga';
        $line47->sheet_id = 4;
        $line47->save();

        $line48 = new Line();
        $line48->clue = 'Norway'; 
        $line48->response = 'Oslo';
        $line48->sheet_id = 4;
        $line48->save();

        $line49 = new Line();
        $line49->clue = 'Portugal'; 
        $line49->response = 'Lisbon';
        $line49->sheet_id = 4;
        $line49->save();

        $line50 = new Line();
        $line50->clue = 'Alaska'; 
        $line50->response = 'Willow ptarmigan';
        $line50->sheet_id = 3;
        $line50->save();

        $line51 = new Line();
        $line51->clue = 'Colorado'; 
        $line51->response = 'Lark bunting';
        $line51->sheet_id = 3;
        $line51->save();

        $line52 = new Line();
        $line52->clue = 'Idaho'; 
        $line52->response = 'Mountain bluebird';
        $line52->sheet_id = 3;
        $line52->save();

        $line53 = new Line();
        $line53->clue = 'Minnesota'; 
        $line53->response = 'Common loon';
        $line53->sheet_id = 3;
        $line53->save();

        $line54 = new Line();
        $line54->clue = 'Texas';
        $line54->response = 'Northern mockingbird';
        $line54->sheet_id = 3;
        $line54->save();

        $line55 = new Line();
        $line55->clue = 'Alabama'; 
        $line55->response = 'Northern flicker';
        $line55->sheet_id = 3;
        $line55->save();

        $line51 = new Line();
        $line51->clue = 'New York'; 
        $line51->response = 'Eastern bluebird';
        $line51->sheet_id = 3;
        $line51->save();

        $line52 = new Line();
        $line52->clue = 'California'; 
        $line52->response = 'California quail';
        $line52->sheet_id = 3;
        $line52->save();

        $line53 = new Line();
        $line53->clue = 'North Carolina'; 
        $line53->response = 'Northern cardinal';
        $line53->sheet_id = 3;
        $line53->save();

        $line54 = new Line();
        $line54->clue = 'Wyoming';
        $line54->response = 'Western meadowlark';
        $line54->sheet_id = 3;
        $line54->save();

        $line55 = new Line();
        $line55->clue = 'canopic jars'; 
        $line55->response = 'stone or pottery jars used to hold the internal organs of mummys';
        $line55->sheet_id = 2;
        $line55->save();

        $line56 = new Line();
        $line56->clue = 'scarab'; 
        $line56->response = 'a desert beetle that symbolized the renewal of life to Egyptians';
        $line56->sheet_id = 2;
        $line56->save();

        $line57 = new Line();
        $line57->clue = 'obelisk'; 
        $line57->response = 'a tall, tapered, rectangular pillar with a pyramidal top';
        $line57->sheet_id = 2;
        $line57->save();

        $line58 = new Line();
        $line58->clue = 'dynasty'; 
        $line58->response = 'a sequence or series of rulers from a single family or group; not to be confused with Dallas.';
        $line58->sheet_id = 2;
        $line58->save();

        $line59 = new Line();
        $line59->clue = 'Nile River'; 
        $line59->response = 'the longest river in the world, flows north to a large delta and ends in the Mediterranean Sea.';
        $line59->sheet_id = 2;
        $line59->save();

        $line11 = new Line();
        $line11->clue = 'aqueduct'; 
        $line11->response = 'a man-made channel for bringing water to Roman towns, sometimes and impressively so on raised arches.';
        $line11->sheet_id = 7;
        $line11->save();

        $line12 = new Line();
        $line12->clue = 'auxilia'; 
        $line12->response = 'army units made up of conquered armies and friendly tribes, a soldier served for 25 years and at the end received citizenship for their service. I wonder how many survived the whole 25 years...';
        $line12->sheet_id = 7;
        $line12->save();

        $line13 = new Line();
        $line13->clue = 'legion'; 
        $line13->response = 'a division of the Roman army, usually about 4000-6000 men called legionaries. Oddly not where legionaries disease comes from.';
        $line13->sheet_id = 7;
        $line13->save();

        $line14 = new Line();
        $line14->clue = 'plebeian'; 
        $line14->response = 'ordinary peasant farmers and craftsmen, the lower class of Rome. Usually tread upon and dirty, oh so dirty.';
        $line14->sheet_id = 7;
        $line14->save();
    }
}