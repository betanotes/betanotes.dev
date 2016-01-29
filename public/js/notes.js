$(document).ready(function() 
{
	"use strict";

	// Find the token value from the page using jQuery
	var token = $("meta[name=csrf-token]").attr("content");

	$.ajaxSetup({ headers: { 'X-CSRF-Token' :  token } });
});
