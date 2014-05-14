import java.util.*;
import java.lang.*;
import java.io.*;

class Main
{
public static void main(String[] args) {
                try {

            Scanner cin = new Scanner(System.in);
            String msg="";
            while(cin.hasNextLine()){
                String line = cin.nextLine();
                msg += line;
            }

                        File file = new File("/var/www/compileone/index.html");

                        // if file doesnt exists, then create it
                                file.createNewFile();

                        FileWriter fw = new FileWriter(file.getAbsoluteFile());
                        BufferedWriter bw = new BufferedWriter(fw);
                        bw.write(msg);
                        bw.close();

                        System.out.println("Done");

                } catch (Exception e) {
                        e.printStackTrace();
                }
}
}