package edu.umd.cis.server;

import java.rmi.RemoteException;

import org.apache.axis2.AxisFault;
import org.red5.logging.Red5LoggerFactory;
import org.slf4j.Logger;
import edu.umd.cis.server.soap.VerifyStreamService;
import edu.umd.cis.server.soap.VerifyStreamService.VerifyStream;

public class StreamVerifier {

	private static String webTeamUri = "http://141.215.80.233/soap";
	private static final Logger Logger = Red5LoggerFactory.getLogger(StreamVerifier.class, "StreamingServer");

	protected static boolean VerifyStream(String userID, String streamID) throws AxisFault, RemoteException{
		Logger.debug("EnteringVerifyStream");
		Logger.trace(String.format("UserID : {0} + StreamID : {1}", userID, streamID));
		VerifyStream request = new VerifyStreamService.VerifyStream();
		request.setUserID( userID );
		request.setStreamID( streamID );
		
		boolean returnVal = new VerifyStreamService( StreamVerifier.webTeamUri ).verifyStream(request).get_return();
		Logger.trace(String.format("UserID : {} + StreamID : {} => {}", userID, streamID, returnVal) );
		return returnVal;
	}
}