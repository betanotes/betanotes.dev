<?php 

class StudylistTableSeeder extends Seeder {

    public function run()
    {
        $user = User::firstOrFail();

        $studylist1 = new Studylist();
        $studylist1->title = 'The Planets in Portuguese'; 
        $studylist1->public_or_private = 'private';
        $studylist1->user_id = $user->id;
        $studylist1->save();

        $studylist2 = new Studylist();
        $studylist2->title = 'State Capitals';
        $studylist2->public_or_private = 'public';
        $studylist2->user_id = $user->id;
        $studylist2->save();

        $studylist3 = new Studylist();
        $studylist3->title = 'State Birds';
        $studylist3->public_or_private = 'private';
        $studylist3->user_id = $user->id;
        $studylist3->save();

        $studylist4 = new Studylist();
        $studylist4->title = 'European Capitals';
        $studylist4->public_or_private = 'public';
        $studylist4->user_id = $user->id;
        $studylist4->save();

        $studylist5 = new Studylist();
        $studylist5->title = 'Spanish Vocab List 7';
        $studylist5->public_or_private = 'public';
        $studylist5->user_id = $user->id;
        $studylist5->save();
    }
}