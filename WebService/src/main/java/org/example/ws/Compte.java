package org.example.ws;

import jakarta.xml.bind.annotation.XmlAccessType;
import jakarta.xml.bind.annotation.XmlAccessorType;
import jakarta.xml.bind.annotation.XmlRootElement;
import jakarta.xml.bind.annotation.XmlTransient;

import java.util.Date;

@XmlRootElement(name = "compte")
@XmlAccessorType(XmlAccessType.FIELD) //les annotations concernent just les champs et pas les getters et setters
public class Compte {
    private int code;
    private double solde;
    @XmlTransient  //ignorer ce champ lors de la sérialisation
    private Date createdAt;

    public Compte(int code, double solde, Date createdAt) {
        this.code = code;
        this.solde = solde;
        this.createdAt = createdAt;
    }
    public Compte() {

    }
    //getters and setters :

    public int getCode() {
        return code;
    }

    public void setCode(int code) {
        this.code = code;
    }

    public double getSolde() {
        return solde;
    }

    public void setSolde(double solde) {
        this.solde = solde;
    }

    public Date getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Date createdAt) {
        this.createdAt = createdAt;
    }
}