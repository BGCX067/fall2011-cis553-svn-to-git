/**
 * VerifyStreamServiceCallbackHandler.java
 *
 * This file was auto-generated from WSDL
 * by the Apache Axis2 version: 1.6.1  Built on : Aug 31, 2011 (12:22:40 CEST)
 */

package edu.umd.cis.server.soap;

/**
 * VerifyStreamServiceCallbackHandler Callback class, Users can extend this class
 * and implement their own receiveResult and receiveError methods.
 */
public abstract class VerifyStreamServiceCallbackHandler {

	protected Object clientData;

	/**
	 * User can pass in any object that needs to be accessed once the
	 * NonBlocking Web service call is finished and appropriate method of this
	 * CallBack is called.
	 * 
	 * @param clientData
	 *            Object mechanism by which the user can pass in user data that
	 *            will be avilable at the time this callback is called.
	 */
	public VerifyStreamServiceCallbackHandler(Object clientData) {
		this.clientData = clientData;
	}

	/**
	 * Please use this constructor if you don't want to set any clientData
	 */
	public VerifyStreamServiceCallbackHandler() {
		this.clientData = null;
	}

	/**
	 * Get the client data
	 */

	public Object getClientData() {
		return clientData;
	}

	/**
	 * auto generated Axis2 call back method for verifyStream method override
	 * this method for handling normal response from verifyStream operation
	 */
	public void receiveResultverifyStream(
			edu.umd.cis.server.soap.VerifyStreamService.VerifyStreamResponse result) {
	}

	/**
	 * auto generated Axis2 Error handler override this method for handling
	 * error response from verifyStream operation
	 */
	public void receiveErrorverifyStream(java.lang.Exception e) {
	}

}
