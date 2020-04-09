package cfc.pubsub;

import javax.jms.Connection;
import javax.jms.DeliveryMode;
import javax.jms.Destination;
import javax.jms.JMSException;
import javax.jms.MessageProducer;
import javax.jms.Session;
import javax.jms.TextMessage;

import org.apache.activemq.ActiveMQConnectionFactory;

public class TopicProducer implements Runnable {

    // Connection Factory which will help in connecting to ActiveMQ server
    ActiveMQConnectionFactory connectionFactory = null;

    public TopicProducer(ActiveMQConnectionFactory connectionFactory) {
        this.connectionFactory = connectionFactory;
    }


    public void run() {
        try {
            // First create a connection
            Connection connection = connectionFactory.createConnection();
            connection.start();

            // Now create a Session
            Session session = connection.createSession(false,Session.AUTO_ACKNOWLEDGE);

            // Let's create a topic. If the topic exist,
            // it will return that
            Destination destination = session.createTopic("CFC282");

            // Create a MessageProducer from
            // the Session to the Topic or Queue
            MessageProducer producer = session.createProducer(destination);
            producer.setDeliveryMode(DeliveryMode.PERSISTENT);

            // Create a messages for the current topic
            String text = "JMS - Publish/Subscribe";
            TextMessage message = session.createTextMessage(text);

            // Send the message to topic
            producer.send(message);

            // Do the cleanup
            session.close();
            connection.close();
        } catch (JMSException jmse) {
            System.out.println("Exception: " + jmse.getMessage());
        }
    }

}
