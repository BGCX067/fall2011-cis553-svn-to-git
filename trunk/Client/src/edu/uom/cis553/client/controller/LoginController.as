package edu.uom.cis553.client.controller
{
	import edu.uom.cis553.client.model.ModelLocator;
	
	import flash.events.Event;
	
	import mx.controls.Alert;
	import mx.rpc.events.ResultEvent;

	public class LoginController
	{
		public function LoginController()
		{
		}
		
		private var model:ModelLocator;
		//Return calls from WebService
		private function login(event:Event):void {
			if((event as ResultEvent).result.toString() == 'INVALID_CREDENTIALS') {
				Alert.show("Invalid Username or password. Retry","Message",Alert.OK);
			} 			
		}
		
		private function logout():void {
			model.sessionID = null;
			model.streamID = null;
		}
		
		
	}
}