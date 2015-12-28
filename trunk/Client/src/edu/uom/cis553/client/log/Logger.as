package edu.uom.cis553.client.log
{
	import flash.filesystem.FileStream;
	
	import spark.formatters.DateTimeFormatter;

	public class Logger
	{
		private var stream:FileStream = null;
		private var formatter:DateTimeFormatter = new DateTimeFormatter();
		
		public function Logger()
		{
			var logUtil:LogUtil = new LogUtil();
			stream = logUtil.getLogFileStream();
		}
		
		public function log(msg:String):void {
			var now:Date = new Date();			
			stream.writeUTF(formatter.format(now) + " - " + msg + "\n");
		}
		
		 
	}
}