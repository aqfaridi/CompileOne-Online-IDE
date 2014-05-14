# your code goes here
class BankClient(object):
    def __init__(self, name=None, address=None, account=None, Balance=None):
        self.name = name
        self.address = address
        self.account = account
        self.balance = balance

    def __str__(self):
        return "Client {} has a balance of {}".format(self.name, self.balance)

client_1 = BankClient("Rony", "Dhaka", 1122, 1000)
client_2 = BankClient("Jony", "Dhaka", 2211, 2000)
print(client_1)
print(client_2)