import socket

def get_ip_address(domain):
    # Menghapus karakter "https://", "http://", dan "www."
    domain = domain.replace("https://", "").replace("http://", "").replace("www.", "").replace("/", "")
    
    try:
        ip_address = socket.gethostbyname(domain)
        return ip_address
    except socket.gaierror:
        return None  # Mengembalikan None jika alamat IP tidak ditemukan

if __name__ == "__main__":
    input_file_name = "site.txt"  # Nama file yang berisi daftar domain
    output_file_name = "ip.txt"  # Nama file untuk menyimpan alamat IP
    
    try:
        with open(input_file_name, "r") as input_file, open(output_file_name, "w") as output_file:
            domains = input_file.readlines()
            for domain in domains:
                domain = domain.strip()  # Menghapus karakter newline
                ip = get_ip_address(domain)
                if ip is not None:
                    output_file.write(f"{ip}\n")
                    print(f"Alamat IP untuk {domain} adalah: {ip}")
        
        print(f"Hasil telah disimpan dalam file {output_file_name}.")
    except FileNotFoundError:
        print(f"File {input_file_name} tidak ditemukan.")
