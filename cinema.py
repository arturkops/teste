class Movie:
    def __init__(self, title, genre, rating, duration):
        self.title = title
        self.genre = genre
        self.rating = rating
        self.duration = duration

class Theater:
    def __init__(self, name, location, capacity):
        self.name = name
        self.location = location
        self.capacity = capacity
        self.movies = []

    def add_movie(self, movie):
        self.movies.append(movie)

class Ticket:
    def __init__(self, movie, theater, seat_number):
        self.movie = movie
        self.theater = theater
        self.seat_number = seat_number

class Customer:
    def __init__(self, name, age):
        self.name = name
        self.age = age
        self.tickets = []

    def buy_ticket(self, ticket):
        self.tickets.append(ticket)

# Sample usage:

movie1 = Movie("Avengers: Endgame", "Action", "PG-13", 181)
movie2 = Movie("The Lion King", "Animation", "G", 118)

theater1 = Theater("AMC Theatres", "New York", 500)
theater1.add_movie(movie1)
theater1.add_movie(movie2)

customer1 = Customer("John Smith", 30)

ticket1 = Ticket(movie1, theater1, "A7")
customer1.buy_ticket(ticket1)

print(customer1.name, "bought a ticket for", ticket1.movie.title, "at", ticket1.theater.name, "in seat", ticket1.seat_number)
