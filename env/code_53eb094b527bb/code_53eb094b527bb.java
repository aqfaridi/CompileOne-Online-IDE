import java.util.*;
import java.lang.*;

class Main
{
        public static void main (String[] args) throws java.lang.Exception
        {
                String s = "private String filterString(String code) {\n" +
"  // lets say code = \"some code //comment inside\"\n" +
"  // return the string \"some code\" (without the comment)\n}";

                s = s.replaceAll("//.*?\n","\n");
                System.out.println("s=" + s);

        }
}