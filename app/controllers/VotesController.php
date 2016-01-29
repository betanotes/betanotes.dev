<?php

class VotesController extends BaseController {

	public function vote($modelIdAndType[])
	{
		if ($modelIdAndType[1] == "Note") {
			dd("Success");
		}
    }
}