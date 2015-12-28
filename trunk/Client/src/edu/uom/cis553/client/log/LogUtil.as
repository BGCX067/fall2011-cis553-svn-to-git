package edu.uom.cis553.client.log
{
	import flash.filesystem.File;
	import flash.filesystem.FileMode;
	import flash.filesystem.FileStream;

	public class LogUtil
	{
		private var fileName:String = "CamClient.log";
		
		public function LogUtil()
		{
		}
		
		public function getLogFileStream():FileStream {
			var file:File = File.desktopDirectory.resolvePath(this.fileName);
			if (file.exists) file.deleteFile();
			var fileStream:FileStream = new FileStream();
			fileStream.open(file, FileMode.APPEND);
			return fileStream;
		}
	}
}