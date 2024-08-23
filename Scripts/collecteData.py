# test_mon_script.py

import subprocess

def test_script_execution():
    try:
        # Exécute le script mon_script.py en utilisant subprocess.run
        result = subprocess.run(['python', 'mon_script.py'], capture_output=True, text=True)

        # Vérifie que le script s'est terminé sans erreur (returncode == 0)
        assert result.returncode == 0

        # Vérifie que le message attendu est dans la sortie standard
        assert "Le script principal s'exécute !" in result.stdout.strip()

        print("Test réussi : le script s'exécute correctement.")
    except AssertionError as e:
        print(f"Test échoué : {e}")
        # Affiche la sortie d'erreur pour aider au débogage en cas d'échec du test
        print(result.stderr)

if __name__ == "__main__":
    test_script_execution()

        