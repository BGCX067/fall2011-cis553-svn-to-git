package edu.uom.cis553.client.menu
{
	public class MenuItems
	{
		public function MenuItems()
		{
		}
		
		static public var menubarXML:XMLList =
			<>
				<menuitem label="Camera" data="top">
					<menuitem label="Detect Camera" data="detectcamera"/>
				</menuitem>
				<menuitem label="Stream" data="top">
					<menuitem label="Stream Video" data="streamVideo"/>
				</menuitem>
			</>;
	}
}