package edu.uom.cis553.client.controller
{
	import flash.events.Event;
	import flash.events.EventDispatcher;

	public class MainController
	{
		public function MainController()
		{
		}
		
		public function process(event:Event) 
		{
			var dispatcher:EventDispatcher = new EventDispatcher();
			dispatcher.dispatchEvent(event);
		}
		
	}
}