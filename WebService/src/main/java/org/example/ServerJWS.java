package org.example;

import jakarta.xml.ws.Endpoint;
import org.example.ws.BanqueService;

public class ServerJWS {
    public static void main(String[] args) {

        // lancer un serveur http de jaxws pour consulter BanqueService :
        Endpoint.publish("http://0.0.0.0:9191/",new BanqueService());
        System.out.println("web service est déployé sur http://0.0.0.0:9191/");
    }
}
