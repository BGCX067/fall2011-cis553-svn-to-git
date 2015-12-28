package edu.umd.cis.server;

import org.slf4j.Logger;
import org.red5.logging.Red5LoggerFactory;
import org.red5.server.adapter.ApplicationAdapter;
import org.red5.server.api.IConnection;
import org.red5.server.api.IScope;
import org.red5.server.api.stream.IBroadcastStream;


public class Application extends ApplicationAdapter {

	private static final Logger Logger = Red5LoggerFactory.getLogger( Application.class, "StreamingServer" );
	
	@Override
	public boolean appStart( IScope scope )
	{
		Logger.debug( "Entering start" );
		Logger.trace( "Scope Path : {}",  scope.getPath() ); 
		Logger.debug( "Leaving start" );
		return super.appStart(scope);
	}
	
    @Override
	public boolean connect(IConnection conn, IScope scope, Object[] params) {
    	Logger.debug( "Entering connect" );
    	Logger.trace( "Connection Path : {}" , conn.getPath() );
    	for( Object p : params ) {
    		Logger.trace( "Connection Param : {}", p);
    	}
    	Logger.debug( "Leaving connect" );
		return super.connect(conn, scope, params );
	}

    @Override
	public void disconnect(IConnection conn, IScope scope) {
    	Logger.debug( "Entering disconnect" );
    	Logger.debug( "Leaving disconnect" );
    	super.disconnect(conn, scope);
	}
    
    @Override
    public void streamPublishStart(IBroadcastStream stream) {
    	Logger.debug( "Entering streamRecordStart" );
    	Logger.trace( "Stream Name : {}" , stream.getName() );
    	Logger.trace( "Stream Published Name : {}" , stream.getPublishedName());
    	Logger.trace( "Save FileName : {}" , stream.getSaveFilename() );
    	Logger.trace( "Stream Metadata : {}", stream.getMetaData() );
    	Logger.debug( "Leaving streamPublishStart" );
    	super.streamPublishStart(stream);
    }
    
    @Override
    public void streamRecordStart(IBroadcastStream stream) {
    	Logger.debug( "Entering streamRecordStart" );
    	Logger.trace( "Stream Name : {}" , stream.getName() );
    	Logger.trace( "Stream Published Name : {}" , stream.getPublishedName());
    	Logger.trace( "Save FileName : {}" , stream.getSaveFilename() );
    	Logger.trace( "Stream Metadata : {}", stream.getMetaData() );
    	Logger.debug( "Leaving streamRecordStart" );
    	super.streamRecordStart(stream);
    }
    

}
