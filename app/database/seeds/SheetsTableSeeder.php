<?php 

class SheetsTableSeeder extends Seeder {

    public function run()
    {
        // $user = User::firstOrFail();

        $sheet1 = new Sheet();
        $sheet1->title = 'Ancient Roman Cities'; 
        $sheet1->public_or_private = 'private';
        $sheet1->user_id = 1;
        $sheet1->save();

        $sheet2 = new Sheet();
        $sheet2->title = 'Ancient Egypt Vocab';
        $sheet2->public_or_private = 'public';
        $sheet2->user_id = 2;
        $sheet2->save();

        $sheet3 = new Sheet();
        $sheet3->title = 'State Birds';
        $sheet3->public_or_private = 'private';
        $sheet3->user_id = 3;
        $sheet3->save();

        $sheet4 = new Sheet();
        $sheet4->title = 'European Capitals';
        $sheet4->public_or_private = 'public';
        $sheet4->user_id = 4;
        $sheet4->save();

        $sheet5 = new Sheet();
        $sheet5->title = 'Spanish Vocab List 7';
        $sheet5->public_or_private = 'public';
        $sheet5->user_id = 5;
        $sheet5->save();

        $sheet6 = new Sheet();
        $sheet6->title = 'Biology Vocab List for Big Test';
        $sheet6->public_or_private = 'public';
        $sheet6->user_id = 3;
        $sheet6->save();

        $sheet7 = new Sheet();
        $sheet7->title = 'Ancient Rome Study Sheet';
        $sheet7->public_or_private = 'public';
        $sheet7->user_id = 1;
        $sheet7->save();
    }
}