package edu.uom.cis553.client.model
{
	import mx.collections.ArrayCollection;
	import mx.collections.ArrayList;

	[Bindable]
	public class ModelLocator
	{
		//Stores the cameras detected
		public var cameraArray:ArrayList = new ArrayList();
		
		//Stores the authenticated user session id.
		public var sessionID:String = null;
		
		//Stores the current Stream id.
		public var streamID:String = null;
		
		public var streaming:Boolean = false;
		
		private static var _instance:ModelLocator = null; 
		
		public function ModelLocator()
		{
		}

		public static function getInstance():ModelLocator { 
			if (_instance == null)  { 
				_instance = new ModelLocator(); 
			} 
			
			return _instance; 
		} 
		
		
	}
}