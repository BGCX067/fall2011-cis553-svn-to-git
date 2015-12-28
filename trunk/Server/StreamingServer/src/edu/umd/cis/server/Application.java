package edu.umd.cis.server;

import java.io.IOException;

import org.slf4j.Logger;
import org.springframework.core.io.Resource;
import org.red5.logging.Red5LoggerFactory;
import org.red5.server.adapter.ApplicationAdapter;
import org.red5.server.api.IConnection;
import org.red5.server.api.IScope;
import org.red5.server.api.Red5;
import org.red5.server.api.stream.IBroadcastStream;

public class Application extends ApplicationAdapter {

	private static final Logger Logger = Red5LoggerFactory.getLogger(Application.class, "StreamingServer");

	@Override
	public boolean appStart(IScope scope) {
		Logger.debug("Entering start");
		Logger.trace("Scope Path : {}", scope.getPath());
		Logger.debug("Leaving start");
		return super.appStart(scope);
	}

	@Override
	public boolean connect(IConnection conn, IScope scope, Object[] params) {
		Logger.debug("Entering connect");
		Logger.trace("Connection Path : {}", conn.getPath());
		for (Object p : params)
			Logger.trace("Connection Param : {}", p);

		if( params.length != 2) {
			Logger.debug("User did not pass in enough parameters, will be granted view only permissions");
			conn.setAttribute("ViewOnly", (Boolean)true);
			return super.connect(conn,scope,params);
		}
		
		try {
			String username = (String) params[0];
			String uuid = (String) params[1];
			if (StreamVerifier.VerifyStream(username, uuid)) {
				conn.setAttribute("ViewOnly",(Boolean)false);
				Logger.debug("Stream {} for user {} has been verified!", uuid, username);
				Logger.debug("Leaving connect");
				return super.connect(conn, scope, params);
			} else {
				Logger.debug("Stream {} for user {} has been denied!", username, uuid);
				Logger.debug("Leaving connect");
				return false;
			}
		} catch (Exception ex) {
			Logger.error("Error in Connect function", ex);
			Logger.debug("Leaving connect");
			return false;
		}
	}

	@Override
	public void disconnect(IConnection conn, IScope scope) {
		Logger.debug("Entering disconnect");
		Logger.debug("Leaving disconnect");
		super.disconnect(conn, scope);
	}

	@Override
	public void streamPublishStart(IBroadcastStream stream) {
		Logger.debug("Entering streamRecordStart");
		Logger.trace("Stream Name : {}", stream.getName());
		Logger.trace("Stream Published Name : {}", stream.getPublishedName());
		Logger.trace("Save FileName : {}", stream.getSaveFilename());
		Logger.trace("Stream Metadata : {}", stream.getMetaData());
		String filename = stream.getSaveFilename();
		
		if( ((Boolean)Red5.getConnectionLocal().getAttribute("ViewOnly")) == (Boolean)true ) {
			Logger.debug("User is only allowed to connect and view streams");
			stream.stop();
			stream.close();
			Resource resource = this.getScope().getResource(filename);
			try {
				resource.getFile().delete();
			}catch (IOException e) {
				Logger.error("Tried to delete non-existent stream : {}", filename );
			}
			Logger.debug("Leaving streamPublishStart");
			return;
		}
		
		Logger.debug("Leaving streamPublishStart");
		super.streamPublishStart(stream);
	}

	@Override
	public void streamRecordStart(IBroadcastStream stream) {
		Logger.debug("Entering streamRecordStart");
		Logger.trace("Stream Name : {}", stream.getName());
		Logger.trace("Stream Published Name : {}", stream.getPublishedName());
		Logger.trace("Save FileName : {}", stream.getSaveFilename());
		Logger.trace("Stream Metadata : {}", stream.getMetaData());
		String filename = stream.getSaveFilename();
		
		if( ((Boolean)Red5.getConnectionLocal().getAttribute("ViewOnly")) == (Boolean)true ) {
			Logger.debug("User is only allowed to connect and view streams");
			stream.stop();
			stream.close();
			Resource resource = this.getScope().getResource(filename);
			try {
				resource.getFile().delete();
			}catch (IOException e) {
				Logger.error("Tried to delete non-existent stream : {}", filename );
			}
			Logger.debug("Leaving streamRecordStart");
			return;
		}
		Logger.debug("Leaving streamRecordStart");
		super.streamRecordStart(stream);
	}
}
