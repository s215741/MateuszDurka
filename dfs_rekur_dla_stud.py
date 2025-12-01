from collections import defaultdict
 
class Graph:
 
    # Konstruktor
    def __init__(self):
 
        self.graph = defaultdict(list)
 
    # Funkcja dodajaca krawedz do grafu 
    def addEdge(self, u, v):
        self.graph[u].append(v)
 
    # Funkcja wykorzystywana przez DFS
    def DFSUtil(self, v, visited):
 
        # Oznacz bieżący węzeł jako odwiedzony i go wydrukuj
        visited.add(v)
        print(v, end=' ')
 
        # Powtarzaj dla wszystkich wierzchołkow sasiadujących z tym wierzcholkiem
        for neighbour in self.graph[v]:
            if neighbour not in visited:
                self.DFSUtil(neighbour, visited)
 
    # Funkcja do przejscia DFS. Wykorzystuje rekursywny DFSUtil()
    def DFS(self, v):
 
        # Stworz zbior do przechowywania odwiedzonych wierzcholkow
        visited = set()
 
        # Wywołaj rekurencyjną funkcję pomocniczą
        # aby wydrukować na ekranie przejscie w glad (DFS)
        self.DFSUtil(v, visited)
 
if __name__ == "__main__":
    g = Graph()
    g.addEdge(0, 1)
    g.addEdge(0, 2)
    g.addEdge(1, 2)
    g.addEdge(2, 0)
    g.addEdge(2, 3)
    g.addEdge(3, 3)
 
    print("Sciezka DFS z poczatkiem w wezle 2")
    g.DFS(2)
