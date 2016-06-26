package berger;

import java.sql.*;
import org.postgresql.ds.PGSimpleDataSource;

public class ConnectDatabase {
  public static void main(String[] args) {
    // Datenquelle erzeugen und konfigurieren
     PGSimpleDataSource ds = new PGSimpleDataSource();
     ds.setServerName("192.168.74.133");
     ds.setDatabaseName("schokofabrik");
     ds.setUser("schokouser");
     ds.setPassword("schokoUser");
     // Verbindung herstellen
     try{
       Connection con = ds.getConnection();
       // Abfrage vorbereiten und ausführen
       Statement st = con.createStatement();
       ResultSet rs = st.executeQuery("select * from produkt");
       // Ergebnisse verarbeiten
       while (rs.next()) { // Cursor bewegen
         String wert = rs.getString(2);
         System.out.println(wert);
       }
       // aufräumen
       rs.close(); st.close(); con.close();
     } catch (SQLException se){
       se.printStackTrace(System.err);
     }
   }
}
