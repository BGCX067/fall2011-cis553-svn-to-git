package edu.uom.cis553.client.controller
{
	import edu.uom.cis553.client.model.ModelLocator;
	
	import flash.events.Event;
	import flash.media.Camera;
	
	import mx.collections.ArrayList;
	import mx.controls.VideoDisplay;
	


	public class CameraController
	{
		public function CameraController()
		{
		}
		
		private var model:ModelLocator;
		private var camera:Camera;
		private var videoStreamDisplay:VideoDisplay;
		private function detectCameras():void {
			
			model.cameraArray.removeAll();
			model.cameraArray = new ArrayList(Camera.names);
			
		}
		
		private function testCamera():void {
			if(camera != null) {
				attachCameraToLocalDisplay();

			}
		}
		
		private function attachCameraToLocalDisplay():void {
			videoStreamDisplay.attachCamera(camera); 
			videoStreamDisplay.visible=true;
		}
		
		private function detachCameraFromLocalDisplay():void {
			videoStreamDisplay.attachCamera(null); 
			videoStreamDisplay.visible=false;				
		}
		
		private function stopTestCamera():void {
			detachCameraFromLocalDisplay();				
		}		
	}
}