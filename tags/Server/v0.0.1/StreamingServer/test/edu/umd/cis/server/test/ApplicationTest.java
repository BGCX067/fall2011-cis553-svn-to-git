package edu.umd.cis.server.test;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import edu.umd.cis.server.Application;

public class ApplicationTest {

	private Application app;
	
	@Before
	public void setup() {
		this.app = new Application();
	}
	
	@After
	public void teardown() {
		this.app = null;
	}
	
	@Test
	public void appStart() {
		fail("Not yet implemented");
	}

	@Test
	public void connect() {
		fail("Not yet implemented");
	}

	@Test
	public void disconnect() {
		fail("Not yet implemented");
	}

	@Test
	public void streamPublishStart() {
		fail("Not yet implemented");
	}

	@Test
	public void streamRecordStart() {
		fail("Not yet implemented");
	}

}
