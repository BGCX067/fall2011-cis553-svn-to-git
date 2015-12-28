package edu.uom.cis553.client.controller
{
	import edu.uom.cis553.client.model.ModelLocator;
	import edu.uom.cis553.client.model.VideoContentVO;
	
	import flash.events.NetStatusEvent;
	import flash.media.Camera;
	import flash.net.NetConnection;
	import flash.net.NetStream;

	public class StreamController
	{
		public function StreamController()
		{
		}
		
		private var model:ModelLocator;
		private var camera:Camera=null;
		private var ns_publish:NetStream = null;
		private var nc:NetConnection = null;
		
		//stop streaming
		private function stopStreaming():void {
			model.streaming = false;
			if(ns_publish != null) {
				ns_publish.attachCamera(null);
				nc.close();
			}
		}			
		
		//get connection to the Red5 Server
		private function getConnection():void {
			var connectionURL:String = "rtmp://141.215.80.249/StreamingServer";
			nc = new NetConnection();
			nc.connect(connectionURL);
			nc.addEventListener(NetStatusEvent.NET_STATUS, netStatusHandler);
		}
		
		//Event handler during streaming.
		private function netStatusHandler(event:NetStatusEvent):void {
			trace(event.info.code + " | " + event.info.description);
			switch (event.info.code) {
				case "NetConnection.Connect.Success":
					ns_publish = new NetStream(nc);
					ns_publish.addEventListener(NetStatusEvent.NET_STATUS, netStatusHandler);
					ns_publish.attachCamera(camera);
					ns_publish.publish(model.streamID,"record");
					break;
				default:
					trace(event.info.code + " | " + event.info.description);
					break;
			}
		}
		
		//End Stream functions
		
		
		private function getStreamID():void {
			//Go get the 
			var videoContent:VideoContentVO = new VideoContentVO();
			videoContent.sessionID = model.sessionID;
		}		
		
	}
}