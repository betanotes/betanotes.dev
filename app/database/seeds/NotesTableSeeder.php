<?php 

class NotesTableSeeder extends Seeder {

    public function run()
    {
        $user = User::firstOrFail();

        $notes1 = new Note();
        $notes1->title = 'How to Begin Birding'; 
        $notes1->public_or_private = 'private';
        $notes1->body = 'Get Excited and Read Up. Gear Up. Get Outside. Some form of binoculars and that field guide you bought earlier are plenty to get started.  As you get better, you may want to invest in a nice camera or a spotting scope (for the really far-off birds), but they’re by no means required.';
        $notes1->user_id = $user->id;
        $notes1->save();

        $notes2 = new Note();
        $notes2->title = 'Migratory Birds of the Central Flyway';
        $notes2->public_or_private = 'public';
        $notes2->body = 'The Central Flyway comprises more than half the landmass of the continental United States, before extending into Central and South America. Audubon works to protect threatened ecosystems, such as riparian habitat in the Colorado River basin and vast sagebrush habitats, on behalf of such iconic bird species as the Yellow-billed Cuckoo and the Greater Sage-Grouse.';
        $notes2->user_id = $user->id;
        $notes2->save();

        $notes3 = new Note();
        $notes3->title = 'Winter Birds';
        $notes3->public_or_private = 'private';
        $notes3->body = 'Create a songbird border of native trees and shrubs to shelter your yard from the wind. Make a brush pile in the corner of the yard to shelter the birds from predators and storms and to provide night roosting places. Rake leaves up under trees and shrubs—and leave them there. Turn part of your lawn into a mini-meadow by letting it grow up in grass and weeds. (Mow it once a year, in late summer.)';
        $notes3->user_id = $user->id;
        $notes3->save();
    }
}