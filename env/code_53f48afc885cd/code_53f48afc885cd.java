import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.util.List;
import java.util.Map;

public class BasicAuthNeeded {
  public static void main(String[] args) throws Exception {
    String s;
    s = "http://www.y.com/authTest";
    URL url = new URL(s);

    URLConnection urlc = url.openConnection();

    Map<String, List<String>> hf = urlc.getHeaderFields();
    for (String key : hf.keySet())
      System.out.println(key + ": " + urlc.getHeaderField(key));

    System.out.println(((HttpURLConnection) urlc).getResponseCode());
  }
}